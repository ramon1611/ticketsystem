<?php
/**
 * File: config.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * @author ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 12:57:19 am
 * Modified By: ramon1611
 */

namespace ramon1611;

$GLOBALS['dbInfo'] = array(
	'host'		=> 'localhost',#'idb',
	'dbType'	=> 'mysqli',#'mssql',
	'database'	=> 'ticket',
	'username'	=> 'ticket',
	'password'	=> 'china',
	'charset'	=> 'utf8'
);

$GLOBALS['tables'] = array(
    'settings'          => 'config',
    'pages'             => 'pages',
    'strings'           => 'strings',
    'styles'            => 'stylesheets',
    'sessions'          => 'sessions',
    'tickets'           => 'tickets',
    'labels'            => 'labels',
    'labels2tickets'    => 'labels2tickets',
    'customers'         => 'customers'
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
        'order'         => '[order]'
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
        'displayName'   => 'displayName'
    ),

    'labels2tickets'    => array(
        'labelID'   => 'labelID',
        'ticketID'  => 'ticketID'
    ),

    'customers' => array(
        'ID'            => 'customerID',
        'name'          => 'name',
        'contactPerson' => 'contactPerson'
    )
);
?>
