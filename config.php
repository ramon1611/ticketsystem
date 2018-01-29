<?php
/**
 * File: config.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * @author ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 6:54:43 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Error Handler Config
$GLOBALS['errorHandler_errorStylesheetFileName'] = 'error.css';
$GLOBALS['errorHandler_excludeFiles'] = array(
    'access.class.php',
    'mssql.class.php',
    'mysql.class.php',
    'mysqli.class.php',
    'odbc.class.php'
);

//* Database Connection Info
$GLOBALS['dbInfo'] = array(
	'host'		=> 'idb',#'idb',
	'dbType'	=> 'mssql',#'mssql',
	'database'	=> 'ticket',
	'username'	=> 'ticket',
	'password'	=> 'china',
	'charset'	=> 'utf-8'
);

//* Database Table Names
$GLOBALS['tables'] = array(
    'settings'              => 'config',
    'pages'                 => 'pages',
    'strings'               => 'strings',
    'styles'                => 'stylesheets',
    'scripts'               => 'scripts',
    'sessions'              => 'sessions',
    'tickets'               => 'tickets',
    'labels'                => 'labels',
    'labels2tickets'        => 'labels2tickets',
    'customers'             => 'customers',
    'users'                 => 'users',
    'groups'                => 'groups',
    'permissions'           => 'permissions',
    'users2groups'          => 'users2groups',
    'permissions2groups'    => 'permissions2groups',
    'userHandlers'          => 'userHandlers'
);

//* Database Column Names
$GLOBALS['columns'] = array(
    'settings'  => array(
        'ID'    => 'settingID',
        'name'  => 'name',
        'value' => 'value'
    ),

    'pages'     => array(
        'ID'            => 'pageID',
        'name'          => 'name',
        'displayName'   => 'displayName',
        'styles'        => 'stylesheets',
        'scripts'       => 'scripts',
        'viewInNav'     => 'viewInNav',
        'order'         => 'order'
    ),

    'sessions'  => array(
        'ID'        => 'sessionID',
        'userID'    => 'userID',
        'expire'    => 'expireTimestamp'
    ),

    'strings'   => array(
        'ID'    => 'stringID',
        'name'  => 'name',
        'value' => 'value'
    ),

    'styles'   => array(
        'ID'        => 'styleID',
        'name'      => 'name',
        'fileName'  => 'fileName'
    ),

    'scripts'   => array(
        'ID'        => 'scriptID',
        'name'      => 'name',
        'type'      => 'type',
        'fileName'  => 'fileName',
        'isAsync'   => 'isAsync'
    ),

    'tickets'   => array(
        'ID'            => 'ticketID',
        'from'          => 'from',
        'subject'       => 'subject',
        'timestamp'     => 'creationTimestamp',
        'ownerID'       => 'ownerID',
        'customerID'    => 'customerID',
        'status'        => 'status'
    ),

    'labels'    => array(
        'ID'            => 'labelID',
        'name'          => 'name',
        'displayName'   => 'displayName',
        'bg-color'      => 'bg-color',
        'text-color'    => 'text-color'
    ),

    'labels2tickets'    => array(
        'labelID'   => 'labelID',
        'ticketID'  => 'ticketID'
    ),

    'customers' => array(
        'ID'            => 'customerID',
        'name'          => 'name',
        'contactPerson' => 'contactPerson'
    ),

    'users' => array(
        'ID'            => 'userID',
        'name'          => 'name',
        'mail'          => 'mail',
        'profilePic'    => 'profilePicFileName',
        'passHash'      => 'passwordHash'
    ),

    'groups'    => array(
        'ID'            => 'groupID',
        'name'          => 'name',
        'displayName'   => 'displayName'
    ),

    'permissions'   => array(
        'ID'    => 'permissionID',
        'name'  => 'name'
    ),

    'users2groups'  => array(
        'userID'    => 'userID',
        'groupID'   => 'groupID'
    ),

    'permissions2groups'    => array(
        'permissionID'  => 'permissionID',
        'groupID'       => 'groupID'
    ),

    'userHandlers'  => array(
        'ID'        => 'userHandlerID',
        'name'      => 'name',
        'pageID'    => 'pageID'
    )
);
?>
