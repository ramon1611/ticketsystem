<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: error_handler.inc.php 
 *  @Date: 2017-12-13 11:24:01 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-14 14:44:08
 */

function error_handler ( $errno, $errstr, $errfile, $errline, array $errcontext ) {
    $excludeFiles = array(
        'access.class.php'  => true,
        'mssql.class.php'   => true,
        'mysql.class.php'   => true,
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

                echo( generateError( $errfile, $errline, $errstr, $errcontext ) );
                ob_end_flush();
                exit(1);
                break;

            case E_USER_WARNING:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateWarning( $errfile, $errline, $errstr ) );
                break;
            
            case E_USER_NOTICE:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateNotice( $errfile, $errline, $errstr ) );
                break;

            case E_ERROR:
                if ( ob_get_contents() != NULL )
                    ob_clean();

                echo( generateError( $errfile, $errline, $errstr, $errcontext ) );
                ob_end_flush();
                exit(1);
                break;

            case E_WARNING:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateWarning( $errfile, $errline, $errstr ) );
                break;
            case E_NOTICE:
                if ( isset( $excludeFiles[basename( $errfile )] ) )
                    if ( $excludeFiles[basename( $errfile )] )
                        return true;

                echo( generateNotice( $errfile, $errline, $errstr ) );
                break;

            default:
                if ( ob_get_contents() != NULL )
                    ob_clean();

                echo( generateError( $errfile, $errline, $errstr, $errcontext, 'Unknown Error!' ) );
                ob_end_flush();
                exit(1);
                break;
        }

        return true;
    }
}

function generateNotice( $errfile, $errline, $errstr ) {
    $caption = '<div style="margin: 10px !important; border: 2px solid #888 !important; font-family: Calibri, Helvetica, Verdana, Arial !important; font-size: 13pt !important; color: #000 !important; text-align: left !important;">
                <div style="font-size: 15pt !important; font-weight: bold !important; padding: 5px 5px 5px 10px !important; border-bottom: 2px solid #888 !important; background-color: #FFF194 !important;">Notice!</div>';
    $content = '<div style="padding: 5px !important; background-color: #E6E6E6 !important;">
                <p style="margin: 0 auto !important;">Notice occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>
                <p style="margin: 0 auto !important;"><b>Message:</b> '.$errstr.'</p>
                </div></div>';

    return $caption.$content;
}

function generateWarning( $errfile, $errline, $errstr ) {
    $caption = '<div style="margin: 10px !important; border: 2px solid #888 !important; font-family: Calibri, Helvetica, Verdana, Arial !important; font-size: 13pt !important; color: #000 !important; text-align: left !important;">
                <div style="font-size: 15pt !important; font-weight: bold !important; padding: 5px 5px 5px 10px !important; border-bottom: 2px solid #888 !important; background-color: #F79545 !important;">Warning!</div>';
    $content = '<div style="padding: 5px !important; background-color: #E6E6E6 !important;">
                <p style="margin: 0 auto !important;">Warning occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>
                <p style="margin: 0 auto !important;"><b>Message:</b> '.$errstr.'</p>
                </div></div>';

    return $caption.$content;
}

function generateError( $errfile, $errline, $errstr, array $errcontext, $title = 'Fatal Error!', $stylesheet = './css/error.css' ) {
    $caption = $title;
    $content = '<p class="errorInfo">Error occurred in File <b>"'.$errfile.'"</b> in line <b>'.$errline.'</b></p>'.
               '<p class="errorMessage"><b>Message:</b> '.$errstr.'</p>'.
               '<div class="stacktrace"><div class="stCaption">Stacktrace</div><pre class="stContent">'.print_r( $errcontext, true ).'</pre></div>';
    
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

$alter_error_handler = set_error_handler( 'error_handler' );
?>