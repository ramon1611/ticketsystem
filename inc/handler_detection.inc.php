<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: handler_detection.inc.php
 *  @Date: 2017-12-14 14:43:47 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 12:22:10
 */

function require_handler(  ) {

}

//* System Handlers
foreach ( $path['includes']['system_handlers'] as $handlerPath ) {
    if ( file_exists( $handlerPath ) )
        require_once( $handlerPath );
    else
        trigger_error( 'The file "'.$handlerPath.'" does not exist!', E_USER_ERROR );
}

//* Custom Handlers
if ( isset( $_GET['handler'] ) ) {
    $handler = $_GET['handler'];

    if ( isset( $_GET['action'] ) ) {
        $_handlerAction = $_GET['action'];
        $handlerPath = $path['includes']['user_handlersDir'].'/'.$handler.'.inc.php';

        if ( file_exists( $handlerPath ) )
            require_once( $handlerPath );
        else
            trigger_error( 'The file "'.$handlerPath.'" does not exist!', E_USER_WARNING );
    } else
        trigger_error( 'A user handler can not be used without an action!', E_USER_WARNING );
}
?>