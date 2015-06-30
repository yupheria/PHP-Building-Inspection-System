<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "default";
$active_record = TRUE;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "";
$db['default']['database'] = "wp_storecrm";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

$db['cpc']['hostname'] = "localhost";
$db['cpc']['username'] = "root";
$db['cpc']['password'] = "";
$db['cpc']['database'] = "cpc";
$db['cpc']['dbdriver'] = "mysql";
$db['cpc']['dbprefix'] = "";
$db['cpc']['pconnect'] = TRUE;
$db['cpc']['db_debug'] = TRUE;
$db['cpc']['cache_on'] = FALSE;
$db['cpc']['cachedir'] = "";
$db['cpc']['char_set'] = "utf8";
$db['cpc']['dbcollat'] = "utf8_general_ci";

$db['bis2']['hostname'] = "localhost";
$db['bis2']['username'] = "root";
$db['bis2']['password'] = "";
$db['bis2']['database'] = "bis2";
$db['bis2']['dbdriver'] = "mysql";
$db['bis2']['dbprefix'] = "";
$db['bis2']['pconnect'] = TRUE;
$db['bis2']['db_debug'] = TRUE;
$db['bis2']['cache_on'] = FALSE;
$db['bis2']['cachedir'] = "";
$db['bis2']['char_set'] = "utf8";
$db['bis2']['dbcollat'] = "utf8_general_ci";

 $db['yuphemy']['hostname'] = 'localhost';
 $db['yuphemy']['username'] = 'root';
 $db['yuphemy']['password'] = '';
 $db['yuphemy']['database'] = 'yuphemy';
 $db['yuphemy']['dbdriver'] = 'mysql';
 $db['yuphemy']['dbprefix'] = '';
 $db['yuphemy']['pconnect'] = TRUE;
 $db['yuphemy']['db_debug'] = TRUE;
 $db['yuphemy']['cache_on'] = FALSE;
 $db['yuphemy']['cachedir'] = '';
 $db['yuphemy']['char_set'] = 'utf8';
 $db['yuphemy']['dbcollat'] = 'utf8_general_ci';
 
 $db['Selwyn']['hostname'] = 'localhost';
 $db['Selwyn']['username'] = 'root';
 $db['Selwyn']['password'] = '';
 $db['Selwyn']['database'] = 'Selwyn';
 $db['Selwyn']['dbdriver'] = 'mysql';
 $db['Selwyn']['dbprefix'] = '';
 $db['Selwyn']['pconnect'] = TRUE;
 $db['Selwyn']['db_debug'] = TRUE;
 $db['Selwyn']['cache_on'] = FALSE;
 $db['Selwyn']['cachedir'] = '';
 $db['Selwyn']['char_set'] = 'utf8';
 $db['Selwyn']['dbcollat'] = 'utf8_general_ci';
 