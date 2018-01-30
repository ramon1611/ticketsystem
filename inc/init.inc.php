<?php
/**
 * File: init.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Tuesday, 30th January 2018 10:13:40 am
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Definitions
$GLOBALS['path'] = array(
	'root'			=> $GLOBALS['hostInfo']['baseDir'],
	'index'			=> $GLOBALS['hostInfo']['baseDir'].'/index.php',
	'configFile'    => $GLOBALS['hostInfo']['baseDir'].'/config.php',

	'includesDir'	=> $GLOBALS['hostInfo']['baseDir'].'/inc',
	'includes'		=> array(
		'init'					=> $GLOBALS['hostInfo']['baseDir'].'/inc/init.inc.php',
		'error_handler'			=> $GLOBALS['hostInfo']['baseDir'].'/inc/error_handler.inc.php',
        'handler_detection'	    => $GLOBALS['hostInfo']['baseDir'].'/inc/handler_detection.inc.php',
        'load_database'         => $GLOBALS['hostInfo']['baseDir'].'/inc/load_database.inc.php',
        
        'smartyPluginsDir'      => $GLOBALS['hostInfo']['baseDir'].'/inc/smartyPlugins',
        'user_handlersDir'		=> $GLOBALS['hostInfo']['baseDir'].'/inc/user_handlers',
		'system_handlersDir'	=> $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers',

        'system_handlers'   => array(	//! Order by Priority
			'session_handler'	    => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/session_handler.inc.php',
            'page_handler'		    => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/page_handler.inc.php',
            'group_handler'         => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/group_handler.inc.php',
            'permission_handler'    => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/permission_handler.inc.php',
            'label_handler'         => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/label_handler.inc.php',
            'ticket_handler'        => $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/ticket_handler.inc.php'
		)
	),

    'styles'	    		=> './css',
    'scripts'               => './scripts',
	'templates'				=> $GLOBALS['hostInfo']['baseDir'].'/templates',
	'templates_compiled'	=> $GLOBALS['hostInfo']['baseDir'].'/templates/compiled',
	'config'				=> $GLOBALS['hostInfo']['baseDir'].'/config',
    'cache'					=> $GLOBALS['hostInfo']['baseDir'].'/cache',

    'composer'              => array(
        'autoload'          => $GLOBALS['hostInfo']['baseDir'].'/vendor/autoload.php'
    )
);

$GLOBALS['pageParams'] = $_GET;

$GLOBALS['page'] = array(
	'ID'		=> NULL, // = pageID from DB
	'name'		=> NULL, // = name from DB
	'title'		=> NULL, // = displayName from DB + Suffix
	'caption'	=> NULL, // = displayName from DB
    'href'		=> NULL,
    'styles'	=> NULL, // = stylesheets from DB
    'scripts'   => NULL, // = scripts from DB
    'order'     => NULL, // = order from DB
	'items'		=> NULL  // Array of Page-Arrays
);

$GLOBALS['session'] = array(
    'current'   => NULL, // Object of class Session
    'items'     => NULL  // Array of objects of class Session
);

$GLOBALS['user'] = array(
    'current'   => NULL, // Object of class User
    'items'     => NULL  // Array of objects of class User
);

$GLOBALS['settings'] = NULL;
$GLOBALS['strings'] = NULL;
$GLOBALS['styles'] = NULL;
$GLOBALS['scripts'] = NULL;
$GLOBALS['tickets'] = NULL;
$GLOBALS['labels'] = NULL;
$GLOBALS['customers'] = NULL;
$GLOBALS['groups'] = NULL;
$GLOBALS['permissions'] = NULL;

//* Initialization Code
// Include Required Files
require_once( $GLOBALS['path']['configFile'] );
$GLOBALS['classLoader'] = require_once( $GLOBALS['path']['composer']['autoload'] );

// Initialize ErrorHandler
$confArr = array(
    'excludeFiles'      => $GLOBALS['errorHandler_excludeFiles'],
    'errorStylesheet'   => $GLOBALS['path']['styles'].'/'.$GLOBALS['errorHandler_errorStylesheetFileName']
);

$GLOBALS['errorHandler'] = new Libs\ErrorHandler( $confArr );
$GLOBALS['errorHandler']->registerHandler();

// Initialize Smarty
$GLOBALS['smarty'] = new \Smarty();
$GLOBALS['smarty']->setTemplateDir( $GLOBALS['path']['templates'] );
$GLOBALS['smarty']->addPluginsDir( [ $GLOBALS['path']['includes']['smartyPluginsDir'] ] );
$GLOBALS['smarty']->setCompileDir( $GLOBALS['path']['templates_compiled'] );
$GLOBALS['smarty']->setConfigDir( $GLOBALS['path']['config'] );
$GLOBALS['smarty']->setCacheDir( $GLOBALS['path']['cache'] );
## Initialize Switch-Plugin
$GLOBALS['smarty']->loadPlugin('smarty_compiler_switch');
$GLOBALS['smarty']->registerFilter('post', 'smarty_postfilter_switch');

// Connect to Database
$GLOBALS['db'] = newYadal( $GLOBALS['dbInfo']['database'], $GLOBALS['dbInfo']['dbType'] );
if ( ! $GLOBALS['db']->Connect( $GLOBALS['dbInfo']['host'], $GLOBALS['dbInfo']['username'], $GLOBALS['dbInfo']['password'] ) ) {
	$GLOBALS['db']->Close();
	trigger_error( 'A connection to the database could not be established!<br><strong>DB Message:</strong> '.$GLOBALS['db']->getError(), E_USER_ERROR );
}

// Initialize SQLQueryBuilder
$GLOBALS['query'] = new Libs\SQLQueryBuilder();

// Load DB-Data + Handler Detection
require_once( $GLOBALS['path']['includes']['load_database'] );
require_once( $GLOBALS['path']['includes']['handler_detection'] );

// Assign Smarty Vars
$GLOBALS['smarty']->assign( 'tpl_name', $GLOBALS['page']['name'] );
$GLOBALS['smarty']->assign( 'path', $GLOBALS['path'] );
$GLOBALS['smarty']->assign( 'page', $GLOBALS['page'] );
$GLOBALS['smarty']->assign( 'settings', $GLOBALS['settings'] );
$GLOBALS['smarty']->assign( 'strings', $GLOBALS['strings'] );
$GLOBALS['smarty']->assign( 'tickets', $GLOBALS['tickets'] );
$GLOBALS['smarty']->assign( 'labels', $GLOBALS['labels'] );
$GLOBALS['smarty']->assign( 'customers', $GLOBALS['customers'] );
$GLOBALS['smarty']->assign( 'users', $GLOBALS['user'] );

// Display Smarty Template
if ( $GLOBALS['page']['name'] == $GLOBALS['settings']['page.login.pageName'] )
    $GLOBALS['smarty']->display( $GLOBALS['settings']['templates.loginTemplate'] );
else
    $GLOBALS['smarty']->display( $GLOBALS['settings']['templates.masterTemplate'] );

ob_end_flush();
?>
