<?php

civicrm_initialize();

$config = CRM_Core_Config::singleton(); ##
global $databases;
$drupal_prefix = '';
if (isset($databases['default']['default']['prefix'])) {
    if (is_array($databases['default']['default']['prefix'])) {
        $drupal_prefix = $databases['default']['default']['prefix']['default'];
    } else {
        $drupal_prefix = $databases['default']['default']['prefix'];
    }
}

if ($config->dsn != $config->userFrameworkDSN || !empty($drupal_prefix)) {
    $dsnArray = DB::parseDSN($config->dsn);
    $tableNames = CRM_Core_DAO::getTableNames();
    asort($tableNames);
    $tablePrefixes = '$databases[\'default\'][\'default\'][\'prefix\']= array(';
    if ($config->userFramework === 'Backdrop') {
        $tablePrefixes = '$database_prefix = array(';
    }
    // add default prefix: the drupal database prefix
    $tablePrefixes .= "\n  'default' => '$drupal_prefix',";
    $prefix = "";
    if ($config->dsn != $config->userFrameworkDSN) {
        $prefix = "`{$dsnArray['database']}`.";
    }
    foreach ($tableNames as $tableName) {
        $tablePrefixes .= "\n  '" . str_pad($tableName . "'", 41) . " => '{$prefix}',";
    }
    $tablePrefixes .= "\n);";
}

echo $tablePrefixes;

