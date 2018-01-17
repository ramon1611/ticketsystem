<?php
/**
 * File: config.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 17th January 2018 12:15:47 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

$dbInfo = array(
	'host'		=> 'idb',#'idb',
	'dbType'	=> 'mssql',#'mssql',
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
