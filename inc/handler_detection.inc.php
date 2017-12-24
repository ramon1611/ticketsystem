<?php
/**
 * File: handler_detection.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Sunday, 24th December 2017 7:09:07 am
 * Modified By: ramon1611
 */
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
