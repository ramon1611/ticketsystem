<?php
/**
 * File: session_handler.inc.php [system_handler]
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 20th December 2017 9:44:34 am
 * Modified By: ramon1611
 */

if ( isset( $_SESSION['internalID'] ) && $_SESSION['internalID'] != NULL ) {
    $thisSession = new Session( $session['items'], $_SESSION['internalID'] );
    
    if ( $thisSession && $thisSession->check() )
        $session['current'] = $thisSession;
    else
        trigger_error( 'Your session is invalid or expired!', E_USER_WARNING );
} else {
    $newSession = array(
        'ID'        => NULL,
        'userID'    => 0, //! $user['current']->get()['ID'],
        'expire'    => microtime(true) + $settings['session.lifetime'],
    );

    $sql = $db->query( 'INSERT INTO '.$tables['sessions'].' ( '.$columns['sessions']['userID'].', '.$columns['sessions']['expire'].' )
                                                     VALUES ( '.$newSession['userID'].', '.$newSession['expire'].' )' );
}

function killSession( $sessionID ) {
    $sql = $db->query( 'DELETE ' );
}
?>
