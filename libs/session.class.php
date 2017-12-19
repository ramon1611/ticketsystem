<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: session.class.php
 *  @Date: 2017-12-18 07:14:55 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 13:03:28
 */

class Session {
    private $_session = NULL;
    private $_sessions = NULL;
    
    public function __construct( $sessions, $sessionID ) {
        if ( isset( $sessions ) && $sessions != NULL && isset( $sessionID ) && $sessionID != NULL ) {
            $this->_sessions = $sessions;

            if ( isset( $this->_sessions[$sessionID] ) && $this->_sessions[$sessionID] != NULL ) {
                $this->_session = array(
                    'ID'        => $sessionID,
                    'userID'    => $this->_sessions[$sessionID]['userID'],
                    'expire'    => $this->_sessions[$sessionID]['expire']
                );
            } else
                return false;
        } else
            return false;
    }

    public function check( ) {
        if ( $this->_session != NULL ) {
            if ( microtime(true) < $this->_session['expire'] || $this->_session['expire'] == -2 )
                return true;
            else
                return false;
        } else
            return false;
    }

    public function get( ) {
        if ( $this->_session != NULL )
            return $this->_session;
        else
            return false;
    }

    public function renew( $newLifetime ) {
        if ( $this->_session != NULL && isset( $newLifetime ) && $newLifetime != NULL ) {
            $this->_session['expire'] = microtime(true) + $newLifetime;
            return $this->_session;
        } else
            return false;
    }

    public function llap( ) {
        if ( $this->_session != NULL ) {
            $this->_session['expire'] = -2;
            return $this->_session;
        } else
            return false;
    }
    
    public function kill( ) {
        if ( $this->_session != NULL ) {
            $this->_session['expire'] = -1;
            return $this->_session;
        } else
            return false;
    }
}
?>
