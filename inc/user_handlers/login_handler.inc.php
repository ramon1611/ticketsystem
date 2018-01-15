<?php
/**
 * File: login_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Monday, 15th January 2018 10:10:41 am
 * Modified By: ramon1611
 */

if ( isset( $_handlerAction ) ) {
    switch ($_handlerAction) {
        case 'login':
            if ( isset( $_POST['username'], $_POST['password'], $_POST['submit'] ) ) {
                
                
                
            }

            $newSession = array(
                'ID'        => NULL,
                'userID'    => 0, //? $user['current']->get()['ID'],
                'expire'    => microtime(true) + $settings['session.lifetime'],
            );
    
            $cols = array(
                $columns['sessions']['userID'],
                $columns['sessions']['expire']
            );
            $vals = array(
                $newSession['userID'],
                $newSession['expire']
            );
        
            $sql = $db->query( $query->insert( $tables['sessions'], $cols, $vals ) );
            if ( !$sql )
                trigger_error('Could not create a new session!', E_USER_WARNING);
            unset( $sql );
            break;
        
        case 'logout':
            $session['current']->kill();
            if ( killSession( $session['current']->get()['ID'] ) ) {
                session_destroy();
                session_unset();
            } else
                trigger_error( 'Your session could not be terminated!', E_USER_WARNING );
            break;

        default:
            break;
    }
} else
    trigger_error( '[login_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>
