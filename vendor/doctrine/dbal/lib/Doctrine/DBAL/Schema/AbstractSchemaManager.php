<?php
 namespace Doctrine\DBAL\Schema; use Doctrine\DBAL\Events; use Doctrine\DBAL\Event\SchemaColumnDefinitionEventArgs; use Doctrine\DBAL\Event\SchemaIndexDefinitionEventArgs; use Doctrine\DBAL\DBALException; use Doctrine\DBAL\Platforms\AbstractPlatform; abstract class AbstractSchemaManager { protected $_conn; protected $_platform; public function __construct(\Doctrine\DBAL\Connection $conn, AbstractPlatform $platform = null) { $this->_conn = $conn; $this->_platform = $platform ?: $this->_conn->getDatabasePlatform(); } public function getDatabasePlatform() { return $this->_platform; } public function tryMethod() { $args = func_get_args(); $method = $args[0]; unset($args[0]); $args = array_values($args); try { return call_user_func_array(array($this, $method), $args); } catch (\Exception $e) { return false; } } public function listDatabases() { $sql = $this->_platform->getListDatabasesSQL(); $databases = $this->_conn->fetchAll($sql); return $this->_getPortableDatabasesList($databases); } public function listNamespaceNames() { $sql = $this->_platform->getListNamespacesSQL(); $namespaces = $this->_conn->fetchAll($sql); return $this->getPortableNamespacesList($namespaces); } public function listSequences($database = null) { if (is_null($database)) { $database = $this->_conn->getDatabase(); } $sql = $this->_platform->getListSequencesSQL($database); $sequences = $this->_conn->fetchAll($sql); return $this->filterAssetNames($this->_getPortableSequencesList($sequences)); } public function listTableColumns($table, $database = null) { if ( ! $database) { $database = $this->_conn->getDatabase(); } $sql = $this->_platform->getListTableColumnsSQL($table, $database); $tableColumns = $this->_conn->fetchAll($sql); return $this->_getPortableTableColumnList($table, $database, $tableColumns); } public function listTableIndexes($table) { $sql = $this->_platform->getListTableIndexesSQL($table, $this->_conn->getDatabase()); $tableIndexes = $this->_conn->fetchAll($sql); return $this->_getPortableTableIndexesList($tableIndexes, $table); } public function tablesExist($tableNames) { $tableNames = array_map('strtolower', (array) $tableNames); return count($tableNames) == count(\array_intersect($tableNames, array_map('strtolower', $this->listTableNames()))); } public function listTableNames() { $sql = $this->_platform->getListTablesSQL(); $tables = $this->_conn->fetchAll($sql); $tableNames = $this->_getPortableTablesList($tables); return $this->filterAssetNames($tableNames); } protected function filterAssetNames($assetNames) { $filterExpr = $this->getFilterSchemaAssetsExpression(); if ( ! $filterExpr) { return $assetNames; } return array_values( array_filter($assetNames, function ($assetName) use ($filterExpr) { $assetName = ($assetName instanceof AbstractAsset) ? $assetName->getName() : $assetName; return preg_match($filterExpr, $assetName); }) ); } protected function getFilterSchemaAssetsExpression() { return $this->_conn->getConfiguration()->getFilterSchemaAssetsExpression(); } public function listTables() { $tableNames = $this->listTableNames(); $tables = array(); foreach ($tableNames as $tableName) { $tables[] = $this->listTableDetails($tableName); } return $tables; } public function listTableDetails($tableName) { $columns = $this->listTableColumns($tableName); $foreignKeys = array(); if ($this->_platform->supportsForeignKeyConstraints()) { $foreignKeys = $this->listTableForeignKeys($tableName); } $indexes = $this->listTableIndexes($tableName); return new Table($tableName, $columns, $indexes, $foreignKeys, false, array()); } public function listViews() { $database = $this->_conn->getDatabase(); $sql = $this->_platform->getListViewsSQL($database); $views = $this->_conn->fetchAll($sql); return $this->_getPortableViewsList($views); } public function listTableForeignKeys($table, $database = null) { if (is_null($database)) { $database = $this->_conn->getDatabase(); } $sql = $this->_platform->getListTableForeignKeysSQL($table, $database); $tableForeignKeys = $this->_conn->fetchAll($sql); return $this->_getPortableTableForeignKeysList($tableForeignKeys); } public function dropDatabase($database) { $this->_execSql($this->_platform->getDropDatabaseSQL($database)); } public function dropTable($tableName) { $this->_execSql($this->_platform->getDropTableSQL($tableName)); } public function dropIndex($index, $table) { if ($index instanceof Index) { $index = $index->getQuotedName($this->_platform); } $this->_execSql($this->_platform->getDropIndexSQL($index, $table)); } public function dropConstraint(Constraint $constraint, $table) { $this->_execSql($this->_platform->getDropConstraintSQL($constraint, $table)); } public function dropForeignKey($foreignKey, $table) { $this->_execSql($this->_platform->getDropForeignKeySQL($foreignKey, $table)); } public function dropSequence($name) { $this->_execSql($this->_platform->getDropSequenceSQL($name)); } public function dropView($name) { $this->_execSql($this->_platform->getDropViewSQL($name)); } public function createDatabase($database) { $this->_execSql($this->_platform->getCreateDatabaseSQL($database)); } public function createTable(Table $table) { $createFlags = AbstractPlatform::CREATE_INDEXES|AbstractPlatform::CREATE_FOREIGNKEYS; $this->_execSql($this->_platform->getCreateTableSQL($table, $createFlags)); } public function createSequence($sequence) { $this->_execSql($this->_platform->getCreateSequenceSQL($sequence)); } public function createConstraint(Constraint $constraint, $table) { $this->_execSql($this->_platform->getCreateConstraintSQL($constraint, $table)); } public function createIndex(Index $index, $table) { $this->_execSql($this->_platform->getCreateIndexSQL($index, $table)); } public function createForeignKey(ForeignKeyConstraint $foreignKey, $table) { $this->_execSql($this->_platform->getCreateForeignKeySQL($foreignKey, $table)); } public function createView(View $view) { $this->_execSql($this->_platform->getCreateViewSQL($view->getQuotedName($this->_platform), $view->getSql())); } public function dropAndCreateConstraint(Constraint $constraint, $table) { $this->tryMethod('dropConstraint', $constraint, $table); $this->createConstraint($constraint, $table); } public function dropAndCreateIndex(Index $index, $table) { $this->tryMethod('dropIndex', $index->getQuotedName($this->_platform), $table); $this->createIndex($index, $table); } public function dropAndCreateForeignKey(ForeignKeyConstraint $foreignKey, $table) { $this->tryMethod('dropForeignKey', $foreignKey, $table); $this->createForeignKey($foreignKey, $table); } public function dropAndCreateSequence(Sequence $sequence) { $this->tryMethod('dropSequence', $sequence->getQuotedName($this->_platform)); $this->createSequence($sequence); } public function dropAndCreateTable(Table $table) { $this->tryMethod('dropTable', $table->getQuotedName($this->_platform)); $this->createTable($table); } public function dropAndCreateDatabase($database) { $this->tryMethod('dropDatabase', $database); $this->createDatabase($database); } public function dropAndCreateView(View $view) { $this->tryMethod('dropView', $view->getQuotedName($this->_platform)); $this->createView($view); } public function alterTable(TableDiff $tableDiff) { $queries = $this->_platform->getAlterTableSQL($tableDiff); if (is_array($queries) && count($queries)) { foreach ($queries as $ddlQuery) { $this->_execSql($ddlQuery); } } } public function renameTable($name, $newName) { $tableDiff = new TableDiff($name); $tableDiff->newName = $newName; $this->alterTable($tableDiff); } protected function _getPortableDatabasesList($databases) { $list = array(); foreach ($databases as $value) { if ($value = $this->_getPortableDatabaseDefinition($value)) { $list[] = $value; } } return $list; } protected function getPortableNamespacesList(array $namespaces) { $namespacesList = array(); foreach ($namespaces as $namespace) { $namespacesList[] = $this->getPortableNamespaceDefinition($namespace); } return $namespacesList; } protected function _getPortableDatabaseDefinition($database) { return $database; } protected function getPortableNamespaceDefinition(array $namespace) { return $namespace; } protected function _getPortableFunctionsList($functions) { $list = array(); foreach ($functions as $value) { if ($value = $this->_getPortableFunctionDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableFunctionDefinition($function) { return $function; } protected function _getPortableTriggersList($triggers) { $list = array(); foreach ($triggers as $value) { if ($value = $this->_getPortableTriggerDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableTriggerDefinition($trigger) { return $trigger; } protected function _getPortableSequencesList($sequences) { $list = array(); foreach ($sequences as $value) { if ($value = $this->_getPortableSequenceDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableSequenceDefinition($sequence) { throw DBALException::notSupported('Sequences'); } protected function _getPortableTableColumnList($table, $database, $tableColumns) { $eventManager = $this->_platform->getEventManager(); $list = array(); foreach ($tableColumns as $tableColumn) { $column = null; $defaultPrevented = false; if (null !== $eventManager && $eventManager->hasListeners(Events::onSchemaColumnDefinition)) { $eventArgs = new SchemaColumnDefinitionEventArgs($tableColumn, $table, $database, $this->_conn); $eventManager->dispatchEvent(Events::onSchemaColumnDefinition, $eventArgs); $defaultPrevented = $eventArgs->isDefaultPrevented(); $column = $eventArgs->getColumn(); } if ( ! $defaultPrevented) { $column = $this->_getPortableTableColumnDefinition($tableColumn); } if ($column) { $name = strtolower($column->getQuotedName($this->_platform)); $list[$name] = $column; } } return $list; } abstract protected function _getPortableTableColumnDefinition($tableColumn); protected function _getPortableTableIndexesList($tableIndexRows, $tableName=null) { $result = array(); foreach ($tableIndexRows as $tableIndex) { $indexName = $keyName = $tableIndex['key_name']; if ($tableIndex['primary']) { $keyName = 'primary'; } $keyName = strtolower($keyName); if (!isset($result[$keyName])) { $result[$keyName] = array( 'name' => $indexName, 'columns' => array($tableIndex['column_name']), 'unique' => $tableIndex['non_unique'] ? false : true, 'primary' => $tableIndex['primary'], 'flags' => isset($tableIndex['flags']) ? $tableIndex['flags'] : array(), 'options' => isset($tableIndex['where']) ? array('where' => $tableIndex['where']) : array(), ); } else { $result[$keyName]['columns'][] = $tableIndex['column_name']; } } $eventManager = $this->_platform->getEventManager(); $indexes = array(); foreach ($result as $indexKey => $data) { $index = null; $defaultPrevented = false; if (null !== $eventManager && $eventManager->hasListeners(Events::onSchemaIndexDefinition)) { $eventArgs = new SchemaIndexDefinitionEventArgs($data, $tableName, $this->_conn); $eventManager->dispatchEvent(Events::onSchemaIndexDefinition, $eventArgs); $defaultPrevented = $eventArgs->isDefaultPrevented(); $index = $eventArgs->getIndex(); } if ( ! $defaultPrevented) { $index = new Index($data['name'], $data['columns'], $data['unique'], $data['primary'], $data['flags'], $data['options']); } if ($index) { $indexes[$indexKey] = $index; } } return $indexes; } protected function _getPortableTablesList($tables) { $list = array(); foreach ($tables as $value) { if ($value = $this->_getPortableTableDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableTableDefinition($table) { return $table; } protected function _getPortableUsersList($users) { $list = array(); foreach ($users as $value) { if ($value = $this->_getPortableUserDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableUserDefinition($user) { return $user; } protected function _getPortableViewsList($views) { $list = array(); foreach ($views as $value) { if ($view = $this->_getPortableViewDefinition($value)) { $viewName = strtolower($view->getQuotedName($this->_platform)); $list[$viewName] = $view; } } return $list; } protected function _getPortableViewDefinition($view) { return false; } protected function _getPortableTableForeignKeysList($tableForeignKeys) { $list = array(); foreach ($tableForeignKeys as $value) { if ($value = $this->_getPortableTableForeignKeyDefinition($value)) { $list[] = $value; } } return $list; } protected function _getPortableTableForeignKeyDefinition($tableForeignKey) { return $tableForeignKey; } protected function _execSql($sql) { foreach ((array) $sql as $query) { $this->_conn->executeUpdate($query); } } public function createSchema() { $namespaces = array(); if ($this->_platform->supportsSchemas()) { $namespaces = $this->listNamespaceNames(); } $sequences = array(); if ($this->_platform->supportsSequences()) { $sequences = $this->listSequences(); } $tables = $this->listTables(); return new Schema($tables, $sequences, $this->createSchemaConfig(), $namespaces); } public function createSchemaConfig() { $schemaConfig = new SchemaConfig(); $schemaConfig->setMaxIdentifierLength($this->_platform->getMaxIdentifierLength()); $searchPaths = $this->getSchemaSearchPaths(); if (isset($searchPaths[0])) { $schemaConfig->setName($searchPaths[0]); } $params = $this->_conn->getParams(); if (isset($params['defaultTableOptions'])) { $schemaConfig->setDefaultTableOptions($params['defaultTableOptions']); } return $schemaConfig; } public function getSchemaSearchPaths() { return array($this->_conn->getDatabase()); } public function extractDoctrineTypeFromComment($comment, $currentType) { if (preg_match("(\(DC2Type:([a-zA-Z0-9_]+)\))", $comment, $match)) { $currentType = $match[1]; } return $currentType; } public function removeDoctrineTypeFromComment($comment, $type) { return str_replace('(DC2Type:'.$type.')', '', $comment); } } 