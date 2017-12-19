<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: session_handler.inc.php [system_handler]
 *  @Date: 2017-12-13 16:51:23 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 15:18:17
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