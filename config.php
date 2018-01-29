<?php
/**
 * File: config.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * @author ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 2:23:33 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

$GLOBALS['dbInfo'] = array(
	'host'		=> 'idb',#'idb',
	'dbType'	=> 'mssql',#'mssql',
	'database'	=> 'ticket',
	'username'	=> 'ticket',
	'password'	=> 'china',
	'charset'	=> 'utf8'
);

$GLOBALS['tables'] = array(
    'settings'              => 'config',
    'pages'                 => 'pages',
    'strings'               => 'strings',
    'styles'                => 'stylesheets',
    'sessions'              => 'sessions',
    'tickets'               => 'tickets',
    'labels'                => 'labels',
    'labels2tickets'        => 'labels2tickets',
    'customers'             => 'customers',
    'users'                 => 'users',
    'groups'                => 'groups',
    'permissions'           => 'permissions',
    'users2groups'          => 'users2groups',
    'permissions2groups'    => 'permissions2groups'
);

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
    )
);

$GLOBALS['errorHandler_errorStylesheet'] = './css/error.css';
$GLOBALS['errorHandler_excludeFiles'] = array(
    'access.class.php',
    'mssql.class.php',
    'mysql.class.php',
    'mysqli.class.php',
    'odbc.class.php'
);
?>
