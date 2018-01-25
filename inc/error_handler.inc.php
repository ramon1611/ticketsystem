<?php
/**
 * File: error_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 3:33:28 am
 * Modified By: ramon1611
 */

namespace ramon1611;

function error_handler ( $errno, $errstr, $errfile, $errline, array $errcontext ) {
    $excludeFiles = array(
        'access.class.php'  => true,
        'mssql.class.php'   => true,
        'mysql.class.php'   => true,
        'mysqli.class.php'  => true,
        'odbc.class.php'    => true
    );

    if ( !( error_reporting() & $errno ) ) return false;
    else {
        $title = 'Error';
        $caption = 'Error';
        $content = NULL;
        $stylesheet = './css/error.css';

        switch( $errno ) {
            case E_USER_ERROR:
                if ( ob_get_contents() != NULL )
                    ob_clean();

                echo( generateError( $errfile, $errline, $errstr, $errno, $errcontext ) );
                ob_end_flush();
                exit(1);
                break;

            case E_USER_WARNING:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateWarning( $errfile, $errline, $errstr, $errno ) );
                break;
            
            case E_USER_NOTICE:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateNotice( $errfile, $errline, $errstr, $errno ) );
                break;

            case E_ERROR:
                if ( ob_get_contents() != NULL )
                    ob_clean();

                echo( generateError( $errfile, $errline, $errstr, $errno, $errcontext ) );
                ob_end_flush();
                exit(1);
                break;

            case E_WARNING:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateWarning( $errfile, $errline, $errstr, $errno ) );
                break;
            case E_NOTICE:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateNotice( $errfile, $errline, $errstr, $errno ) );
                break;

            default:
                if ( ob_get_contents() != NULL )
                    ob_clean();

                echo( generateError( $errfile, $errline, $errstr, $errno, $errcontext, 'Unknown Error!' ) );
                ob_end_flush();
                exit(1);
                break;
        }

        return true;
    }
}

function generateNotice( $errfile, $errline, $errstr, $errno ) {
    $caption = '<div style="margin: 10px !important; border: 2px solid #888 !important; font-family: Calibri, Helvetica, Verdana, Arial !important; font-size: 13pt !important; color: #000 !important; text-align: left !important;">
                <div style="font-size: 15pt !important; font-weight: bold !important; padding: 5px 5px 5px 10px !important; border-bottom: 2px solid #888 !important; background-color: #FFF194 !important;">Notice! ('.$errno.')</div>';
    $content = '<div style="padding: 5px !important; background-color: #E6E6E6 !important;">
                <p style="margin: 0 auto !important;">Notice occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>
                <p style="margin: 0 auto !important;"><b>Message:</b> '.$errstr.'</p>
                </div></div>';

    return $caption.$content;
}

function generateWarning( $errfile, $errline, $errstr, $errno ) {
    $caption = '<div style="margin: 10px !important; border: 2px solid #888 !important; font-family: Calibri, Helvetica, Verdana, Arial !important; font-size: 13pt !important; color: #000 !important; text-align: left !important;">
                <div style="font-size: 15pt !important; font-weight: bold !important; padding: 5px 5px 5px 10px !important; border-bottom: 2px solid #888 !important; background-color: #F79545 !important;">Warning! ('.$errno.')</div>';
    $content = '<div style="padding: 5px !important; background-color: #E6E6E6 !important;">
                <p style="margin: 0 auto !important;">Warning occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>
                <p style="margin: 0 auto !important;"><b>Message:</b> '.$errstr.'</p>
                </div></div>';

    return $caption.$content;
}

function generateError( $errfile, $errline, $errstr, $errno, array $errcontext, $title = 'Fatal Error!', $stylesheet = './css/error.css' ) {
    $caption = $title.' ('.$errno.')';
    $backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 5 );
    $parsedBacktrace = parseBacktrace( $backtrace );
    $content = '<p class="errorInfo">Error occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>'.
               '<p class="errorMessage"><b>Message:</b> '.$errstr.'</p>';
    if ( $backtrace != false )
               $content .= '<div class="backtrace"><div class="stCaption">Backtrace</div><pre class="stContent">'.$parsedBacktrace.'</pre></div>';
    
    return( '<!DOCTYPE html>
    <html>
        <head>
            <title>'.$title.'</title>
    
            <link rel="stylesheet" type="text/css" href="'.$stylesheet.'">
        </head>
    
        <body>
            <header>
                <span class="mainCaption">'.$caption.'</span>
            </header>

            '.$content.'
        </body>
    </html>' );           
}

function parseBacktrace( array $debugBacktrace ) {
    if ( isset( $debugBacktrace ) ) {
        $out = '';

        foreach ( $debugBacktrace as $btItemNum => $btItem ) {
            $out .= '<strong>'.$btItemNum.'</strong> - ';

            if ( isset( $btItem['file'] ) )
                $out .= 'File: <strong>'.$btItem['file'].'</strong> ';
            if ( isset( $btItem['line'] ) )
                $out .= 'Line: <strong>'.$btItem['line'].'</strong> ';
            if ( isset( $btItem['function'] ) )
                $out .= 'Function: <strong>'.$btItem['function'].'</strong> ';
            if ( isset( $btItem['args'] ) ) {
                $out .= '(Arguments: ';
                
                $lastArg = array_pop( $btItem['args'] );
                foreach ( $btItem['args'] as $arg )
                    $out .= $arg.', ';
                
                $out .= $lastArg.')';
            }

            $out .= '<br>';
        }

        return $out;
    } else
        return false;
}

$alter_error_handler = set_error_handler( 'ramon1611\error_handler' );
?>
