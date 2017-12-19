<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: config.php
 *  @Date: 2017-12-13 16:51:55 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-18 15:36:04
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
    'styles'   => 'stylesheets'
);

$columns = array(
    'settings'      => array(
        'ID'    => 'settingID',
        'name'  => 'name',
        'value' => 'value'
    ),

    'pages'         => array(
        'ID'            => 'pageID',
        'name'          => 'name',
        'displayName'   => 'displayName',
        'styles'        => 'stylesheets',
        'viewInNav'     => 'viewInNav'
    ),

    'sessions'  => array(
        'ID'       => 'sessionID',
        'expire'   => 'expireTimestamp'
    ),

    'strings'       => array(
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