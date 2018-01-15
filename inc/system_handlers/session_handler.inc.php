<?php
/**
 * File: session_handler.inc.php [system_handler]
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Monday, 15th January 2018 10:40:58 am
 * Modified By: ramon1611
 */

if ( isset( $_SESSION['internalID'] ) ) {
    $thisSession = new Session( $session['items'], $_SESSION['internalID'] );
    
    if ( $thisSession && $thisSession->check() )
        $session['current'] = $thisSession;
    else
        trigger_error( 'Your session is invalid or expired!', E_USER_WARNING );
}

function killSession( $sessionID ) {
    //! Untested
    $sql = $db->query( $query->delete( $tables['sessions'], $columns['sessions']['ID'].'='.$sessionID ) );
    if ( $sql )
        return true;
    else
        return false;
}
?>
