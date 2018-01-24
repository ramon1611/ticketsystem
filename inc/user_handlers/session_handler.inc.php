<?php
/**
 * File: session_handler.inc.php [user_handler]
 * Project: Ticketsystem
 * File Created: Tuesday, 19th December 2017 12:24:17 pm
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 24th January 2018 5:44:55 pm
 * Modified By: ramon1611
 */


if ( isset( $_handlerAction ) ) {
    switch ($_handlerAction) {
        case 'logout' || 'killSession' || 'destroySession':
            # code...
            break;
        
        default:
            # code...
            break;
    }

    $GLOBALS['session']['current']->kill();
    
    if ( killSession( $GLOBALS['session']['current']->get()['ID'] ) )
        session_destroy();
    else
        trigger_error( 'Your session could not be terminated!', E_USER_WARNING );
} else
    trigger_error( '[session_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>
