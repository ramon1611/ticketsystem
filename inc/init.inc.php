<?php
/**
 *  @Author: Ramon Rosin
 *  @File: init.inc.php
 *  @Date: 2017-12-13 16:47:53 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-15 15:55:14
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
		'smarty'	=> $hostInfo['baseDir'].'/libs/smarty/smarty.class.php'
	),

	'stylesheets'			=> './css',
	'templates'				=> $hostInfo['baseDir'].'/templates',
	'templates_compiled'	=> $hostInfo['baseDir'].'/templates/compiled',
	'config'				=> $hostInfo['baseDir'].'/config',
	'cache'					=> $hostInfo['baseDir'].'/cache'
);

$page = array(
	'ID'			=> NULL, // = pageID from DB
	'name'			=> NULL, // = name from DB
	'title'			=> NULL, // = displayName from DB + ' | V-BC TS'
	'caption'		=> NULL, // = displayName from DB
	'href'			=> NULL,
	'items'			=> NULL,
	'stylesheets'	=> NULL
);

$settings = NULL;
$strings = NULL;
$stylesheets = NULL;

//* Initialization Code
// Include Required Files
require_once( $path['includes']['error_handler'] );
require_once( $path['configFile'] );
require_once( $path['libs']['yadal'] );
require_once( $path['libs']['smarty'] );

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

// Load Config
$sql = $db->query( 'SELECT * FROM config' );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$settings[$result['setting']] = $result['value'];
		else
			trigger_error( 'Die Einstellung konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result['setting'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Einstellungen aus der Datenbank abgerufen werden! [$db->query(@query:*|settings)]', E_USER_ERROR );
unset( $sql, $result );

// Load Pages
$sql = $db->query( 'SELECT * FROM pages ORDER BY pageID ASC' );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$page['items'][$result['name']] = $result;
		else
			trigger_error( 'Die Seite konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result['name'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Seiten aus der Datenbank abgerufen werden! [$db->query(@query:*|pages)]', E_USER_ERROR );
unset( $sql, $result );

// Load Strings
$sql = $db->query( 'SELECT * FROM strings' );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$strings[$result['name']] = $result['value'];
		else
			trigger_error( 'Die Zeichenfolge konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result['name'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Zeichenfolgen aus der Datenbank abgerufen werden! [$db->query(@query:*|strings)]', E_USER_ERROR );
unset( $sql, $result );

// Load Stylesheets
$sql = $db->query( 'SELECT * FROM stylesheets' );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$stylesheets[$result['ID']] = $result;
		else
			trigger_error( 'Das Stylesheet konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result['name'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Stylesheets aus der Datenbank abgerufen werden! [$db->query(@query:*|stylesheets)]', E_USER_ERROR );
unset( $sql, $result );

// Include Page Handler
require_once( $path['includes']['handler_detection'] );
require_once( $path['includes']['system_handlers']['page_handler'] );

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