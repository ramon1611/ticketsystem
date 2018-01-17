<?php
/**
 * File: init.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 17th January 2018 4:14:12 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Definitions
$path = array(
	'root'			=> $hostInfo['baseDir'],
	'index'			=> $hostInfo['baseDir'].'/index.php',
	'configFile'	=> $hostInfo['baseDir'].'/config.php',

	'includesDir'	=> $hostInfo['baseDir'].'/inc',
	'includes'		=> array(
		'init'					=> $hostInfo['baseDir'].'/inc/init.inc.php',
		'error_handler'			=> $hostInfo['baseDir'].'/inc/error_handler.inc.php',
        'handler_detection'		=> $hostInfo['baseDir'].'/inc/handler_detection.inc.php',
        'load_database'         => $hostInfo['baseDir'].'/inc/load_database.inc.php',
        'class_loader'          => $hostInfo['baseDir'].'/inc/class_loader.inc.php',
        
        'user_handlersDir'		=> $hostInfo['baseDir'].'/inc/user_handlers',
		'system_handlersDir'	=> $hostInfo['baseDir'].'/inc/system_handlers',

        'system_handlers'		=> array(	//! Order by Priority
			'session_handler'	=> $hostInfo['baseDir'].'/inc/system_handlers/session_handler.inc.php',
			'page_handler'		=> $hostInfo['baseDir'].'/inc/system_handlers/page_handler.inc.php'
		)
	),

	'libsDir'		=> $hostInfo['baseDir'].'/libs',
	'libs' 			=> array(
		'nekwitaya'	=> $hostInfo['baseDir'].'/libs/nekwitaya/nekwitaya-framework.class.php'
	),

	'styles'	    		=> './css',
	'templates'				=> $hostInfo['baseDir'].'/templates',
	'templates_compiled'	=> $hostInfo['baseDir'].'/templates/compiled',
	'config'				=> $hostInfo['baseDir'].'/config',
    'cache'					=> $hostInfo['baseDir'].'/cache',

    'composer'              => array(
        'autoload'          => $hostInfo['baseDir'].'/vendor/autoload.php'
    )
);

$page = array(
	'ID'		=> NULL, // = pageID from DB
	'name'		=> NULL, // = name from DB
	'title'		=> NULL, // = displayName from DB + Postfix
	'caption'	=> NULL, // = displayName from DB
	'href'		=> NULL,
	'items'		=> NULL,
	'styles'	=> NULL
);

$session = array(
    'current'   => NULL, // Object of class Session
    'items'     => NULL  // Array of objects of class Session
);

$user = array(
    'current'   => NULL, // Object of class User
    'items'     => NULL  // Array of objects of class User
);

$settings = NULL;
$strings = NULL;
$styles = NULL;

//* Initialization Code
// Include Required Files
$classLoader = require_once( $path['composer']['autoload'] );
require_once( $path['includes']['error_handler'] );
require_once( $path['configFile'] );
require_once( $path['includes']['class_loader'] );

// Initialize Smarty
$smarty = new \Smarty();
$smarty->setTemplateDir( $path['templates'] );
$smarty->setCompileDir( $path['templates_compiled'] );
$smarty->setConfigDir( $path['config'] );
$smarty->setCacheDir( $path['cache'] );

// Connect to Database
$db = newYadal( $dbInfo['database'], $dbInfo['dbType'] );
if ( ! $db->Connect( $dbInfo['host'], $dbInfo['username'], $dbInfo['password'] ) ) {
	$db->Close();
	trigger_error( 'Es konnte keine Verbindung zur Datenbank hergestellt werden!', E_USER_ERROR );
}

// Initialize SQLQuery
$query = new Libs\SQLQueryBuilder();

// Load DB-Data + Handler Detection
require_once( $path['includes']['load_database'] );
require_once( $path['includes']['handler_detection'] );

// Assign Smarty Vars
$smarty->assign( 'tpl_name', $page['name'] );
$smarty->assign( 'path', $path );
$smarty->assign( 'page', $page );
$smarty->assign( 'settings', $settings );
$smarty->assign( 'strings', $strings );

// Display Smarty Template
$smarty->display( 'main.tpl' );
ob_end_flush();
?>
