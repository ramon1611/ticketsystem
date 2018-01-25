<?php
/**
 * File: init.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 3:27:04 am
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Definitions
$GLOBALS['path'] = array(
	'root'			=> $GLOBALS['hostInfo']['baseDir'],
	'index'			=> $GLOBALS['hostInfo']['baseDir'].'/index.php',
	'configFile'	=> $GLOBALS['hostInfo']['baseDir'].'/config.php',

	'includesDir'	=> $GLOBALS['hostInfo']['baseDir'].'/inc',
	'includes'		=> array(
		'init'					=> $GLOBALS['hostInfo']['baseDir'].'/inc/init.inc.php',
		'error_handler'			=> $GLOBALS['hostInfo']['baseDir'].'/inc/error_handler.inc.php',
        'handler_detection'		=> $GLOBALS['hostInfo']['baseDir'].'/inc/handler_detection.inc.php',
        'load_database'         => $GLOBALS['hostInfo']['baseDir'].'/inc/load_database.inc.php',
        'class_loader'          => $GLOBALS['hostInfo']['baseDir'].'/inc/class_loader.inc.php',
        'labels'                => $GLOBALS['hostInfo']['baseDir'].'/inc/labels.inc.php',
        
        'user_handlersDir'		=> $GLOBALS['hostInfo']['baseDir'].'/inc/user_handlers',
		'system_handlersDir'	=> $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers',

        'system_handlers'		=> array(	//! Order by Priority
			'session_handler'	=> $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/session_handler.inc.php',
			'page_handler'		=> $GLOBALS['hostInfo']['baseDir'].'/inc/system_handlers/page_handler.inc.php'
		)
	),

	'libsDir'		=> $GLOBALS['hostInfo']['baseDir'].'/libs',
	'libs' 			=> array(
		'nekwitaya'	=> $GLOBALS['hostInfo']['baseDir'].'/libs/nekwitaya/nekwitaya-framework.class.php'
	),

	'styles'	    		=> './css',
	'templates'				=> $GLOBALS['hostInfo']['baseDir'].'/templates',
	'templates_compiled'	=> $GLOBALS['hostInfo']['baseDir'].'/templates/compiled',
	'config'				=> $GLOBALS['hostInfo']['baseDir'].'/config',
    'cache'					=> $GLOBALS['hostInfo']['baseDir'].'/cache',

    'composer'              => array(
        'autoload'          => $GLOBALS['hostInfo']['baseDir'].'/vendor/autoload.php'
    )
);

$GLOBALS['page'] = array(
	'ID'		=> NULL, // = pageID from DB
	'name'		=> NULL, // = name from DB
	'title'		=> NULL, // = displayName from DB + Suffix
	'caption'	=> NULL, // = displayName from DB
    'href'		=> NULL,
    'styles'	=> NULL, // = stylesheets from DB
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
$GLOBALS['tickets'] = NULL;
$GLOBALS['labels'] = NULL;
$GLOBALS['customers'] = NULL;

//* Initialization Code
// Include Required Files
require_once( $GLOBALS['path']['includes']['error_handler'] );
require_once( $GLOBALS['path']['configFile'] );
require_once( $GLOBALS['path']['includes']['class_loader'] );
$GLOBALS['classLoader'] = require_once( $GLOBALS['path']['composer']['autoload'] );

// Initialize Smarty
$smarty = new \Smarty();
$smarty->setTemplateDir( $GLOBALS['path']['templates'] );
$smarty->setCompileDir( $GLOBALS['path']['templates_compiled'] );
$smarty->setConfigDir( $GLOBALS['path']['config'] );
$smarty->setCacheDir( $GLOBALS['path']['cache'] );

// Connect to Database
$db = newYadal( $GLOBALS['dbInfo']['database'], $GLOBALS['dbInfo']['dbType'] );
if ( ! $db->Connect( $GLOBALS['dbInfo']['host'], $GLOBALS['dbInfo']['username'], $GLOBALS['dbInfo']['password'] ) ) {
	$db->Close();
	trigger_error( 'A connection to the database could not be established!<br><strong>DB Message:</strong> '.$db->getError(), E_USER_ERROR );
} else
    $GLOBALS['db'] = $db;

// Initialize SQLQuery
$query = new Libs\SQLQueryBuilder();
$GLOBALS['query'] = $query;

// Load DB-Data + Handler Detection
require_once( $GLOBALS['path']['includes']['load_database'] );
require_once( $GLOBALS['path']['includes']['handler_detection'] );

// Handle Tickets+Labels
require_once( $GLOBALS['path']['includes']['labels'] );

if ( is_array( $GLOBALS['tickets'] ) || is_object( $GLOBALS['tickets'] ) )
foreach ( $GLOBALS['tickets'] as $ticketID => $ticketData ) {
    $labelList = getLabelsOfTicket( $ticketID );

    if ( isset( $labelList ) && $labelList )
        $GLOBALS['tickets'][$ticketID]['labels'] = $labelList;
    else
        trigger_error( 'No labels could be assigned to the tickets!', E_USER_ERROR );
}

// Assign Smarty Vars
$smarty->assign( 'tpl_name', $GLOBALS['page']['name'] );
$smarty->assign( 'path', $GLOBALS['path'] );
$smarty->assign( 'page', $GLOBALS['page'] );
$smarty->assign( 'settings', $GLOBALS['settings'] );
$smarty->assign( 'strings', $GLOBALS['strings'] );
$smarty->assign( 'tickets', $GLOBALS['tickets'] );
$smarty->assign( 'labels', $GLOBALS['labels'] );
$smarty->assign( 'customers', $GLOBALS['customers'] );


// Display Smarty Template
$smarty->display( 'main.tpl' );
ob_end_flush();
?>
