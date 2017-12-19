<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: session_handler.inc.php [user_handler]
 *  @Date: 2017-12-13 16:51:23 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 13:08:00
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

    $session['current']->kill();
    
    if ( killSession( $session['current']->get()['ID'] ) )
        session_destroy();
    else
        trigger_error( 'Your session could not be terminated!', E_USER_WARNING );
} else
    trigger_error( '[session_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>