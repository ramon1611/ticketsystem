<?php
/**
 *  @Author: Ramon Rosin
 *  @File: init.inc.php
 *  @Date: 2017-12-13 16:47:53 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 13:00:28
 */
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
        'loadDB'                => $hostInfo['baseDir'].'/inc/loadDB.inc.php',
		'user_handlersDir'		=> $hostInfo['baseDir'].'/inc/user_handlers',

		'system_handlersDir'	=> $hostInfo['baseDir'].'/inc/system_handlers',
		'system_handlers'		=> array(	//! Order by Priority
			'session_handler'	=> $hostInfo['baseDir'].'/inc/system_handlers/session_handler.inc.php',
			'page_handler'		=> $hostInfo['baseDir'].'/inc/system_handlers/page_handler.inc.php'
		)
	),

	'libsDir'		=> $hostInfo['baseDir'].'/libs',
	'libs' 			=> array(
		'yadal'		=> $hostInfo['baseDir'].'/libs/yadal/yadal.class.php',
		'smarty'	=> $hostInfo['baseDir'].'/libs/smarty/smarty.class.php',
		'session'	=> $hostInfo['baseDir'].'/libs/session.class.php'
	),

	'styles'	    		=> './css',
	'templates'				=> $hostInfo['baseDir'].'/templates',
	'templates_compiled'	=> $hostInfo['baseDir'].'/templates/compiled',
	'config'				=> $hostInfo['baseDir'].'/config',
	'cache'					=> $hostInfo['baseDir'].'/cache'
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
    'items'     => NULL
);

$user = array(
    'current'   => NULL, // Object of class User
    'items'     => NULL
);

$settings = NULL;
$strings = NULL;
$styles = NULL;

//* Initialization Code
// Include Required Files
require_once( $path['includes']['error_handler'] );
require_once( $path['configFile'] );
require_once( $path['libs']['yadal'] );
require_once( $path['libs']['smarty'] );
require_once( $path['libs']['session'] );

// Initialize Smarty
$smarty = new Smarty();
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

// Load DB-Data + Handler Detection
require_once( $path['includes']['loadDB'] );
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