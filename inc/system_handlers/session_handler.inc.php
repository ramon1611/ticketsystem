<?php
/**
 * File: session_handler.inc.php [system_handler]
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 11:05:11 am
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $_SESSION['internalID'] ) ) {
    $thisSession = new Libs\Session( $GLOBALS['session']['items'], $_SESSION['internalID'] );

    if ( isset( $thisSession ) && $thisSession->check() ) {
        $GLOBALS['session']['current'] = $thisSession;

        foreach ($GLOBALS['user']['items'] as $user) {
            if ( $thisSession->get()['userID'] == $user->get()['ID'] )
                $GLOBALS['user']['current'] = $user;
        }
    } else
        trigger_error( 'Your session is invalid or expired!', E_USER_WARNING );
}

function killSession( $sessionID ) {
    //! Untested
    $sql = $GLOBALS['db']->query( $GLOBALS['query']->delete( $GLOBALS['tables']['sessions'], $GLOBALS['columns']['sessions']['ID'].'='.$sessionID ) );
    if ( $sql )
        return true;
    else
        return false;
}
?>
