<?php
/**
 * File: index.php
 * 
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:56 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 31st January 2018 7:34:26 pm
 * Modified By: ramon1611
 */

/**
 * Namespace ramon1611
 */
namespace ramon1611;

error_reporting( E_ALL & ~(E_STRICT|E_NOTICE) );
#error_reporting( E_ALL ); //! #DEBUG

session_start();
ob_start();

header('Content-Type: text/html; charset=UTF-8'); 

$GLOBALS['hostInfo'] = array(
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
$debugFile = $GLOBALS['hostInfo']['baseDir'] . '/debug.php';
if ( file_exists( $debugFile ) )
    require_once( $debugFile );
//! #DEBUG:END

require_once( $GLOBALS['hostInfo']['baseDir'] . '/inc/init.inc.php' );
?>
