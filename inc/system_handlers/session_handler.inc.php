<?php
/**
 * File: session_handler.inc.php [system_handler]
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 20th December 2017 4:33:03 pm
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
        'userID'    => 0, //? $user['current']->get()['ID'],
        'expire'    => microtime(true) + $settings['session.lifetime'],
    );

    //! Untested
    #$sql = $db->query( 'INSERT INTO '.$tables['sessions'].' ( '.$columns['sessions']['userID'].', '.$columns['sessions']['expire'].' )
    #                                                 VALUES ( '.$newSession['userID'].', '.$newSession['expire'].' )' );
    $cols = array(
        $columns['sessions']['userID'],
        $columns['sessions']['expire']
    );
    $vals = array(
        $newSession['userID'],
        $newSession['expire']
    );
    
    $sql = $db->query( $query->insert( $tables['sessions'], $cols, $vals ) );
    //TODO: Check for fails
}

function killSession( $sessionID ) {
    //! Untested
    $sql = $db->query( $query->delete( $tables['sessions'], $columns['sessions']['ID'].'='.$sessionID ) );
    //TODO: Check for fails
}
?>
