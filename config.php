<?php
/**
 * File: config.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 20th December 2017 9:52:37 am
 * Modified By: ramon1611
 */

$dbInfo = array(
	'host'		=> 'idb',
	'dbType'	=> 'mssql',
	'database'	=> 'ticket',
	'username'	=> 'ticket',
	'password'	=> 'china',
	'charset'	=> 'utf8'
);

$tables = array(
    'settings'      => 'config',
    'pages'         => 'pages',
    'strings'       => 'strings',
    'styles'        => 'stylesheets',
    'sessions'      => 'sessions'
);

$columns = array(
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
        'viewInNav'     => 'viewInNav'
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
    )
);
?>
