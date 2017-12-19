<?php
/**
 *  @Author: Ramon Rosin
 *  @File: index.php
 *  @Date: 2017-12-13 16:48:30 
 *  @Last Modified by: Ramon Rosin
 *  @Last Modified time: 2017-12-13 16:49:43
 */
#error_reporting( E_ALL & ~(E_STRICT|E_NOTICE) );
#error_reporting( E_ALL ); //! #DEBUG

session_start();
ob_start();


$hostInfo = array(
	'baseDir'		=> __DIR__,
	'docRoot'		=> preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']),
	'baseUrl'		=> preg_replace('!^' . preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']) . '!', '', __DIR__) . '/',
	'protocol'		=> empty($_SERVER['HTTPS']) ? 'http' : 'https',
	'port'			=> $_SERVER['SERVER_PORT'],
	'dispPort'		=> ':' . $_SERVER['SERVER_PORT'],
	'domain'		=> $_SERVER['SERVER_NAME'],
	'partialUrl'	=> (empty($_SERVER['HTTPS']) ? 'http' : 'https') . '://' . $_SERVER['SERVER_NAME'] . preg_replace('!^' . preg_replace('!{' . $_SERVER['SCRIPT_NAME'] . '}$!', '', $_SERVER['SCRIPT_FILENAME']) . '!', '', __DIR__) . '/',
	'fullUrl'		=> (empty($_SERVER['HTTPS']) ? 'http' : 'https') . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . preg_replace('!^' . preg_replace('!{' . $_SERVER['SCRIPT_NAME'] . '}$!', '', $_SERVER['SCRIPT_FILENAME']) . '!', '', __DIR__) . '/'
);

//! #DEBUG:BEGIN
function debug( $var, $die = false ) {
	echo '#DEBUG:BEGIN<br>';
	if ( is_array( $var ) ) {
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
	} else
		var_dump( $var );

	echo '#DEBUG:END<br>';
	if ( $die )
		die();
}
//! #DEBUG:END

require_once( $hostInfo['baseDir'] . '/inc/init.inc.php' );
?>