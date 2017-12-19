<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: session.class.php
 *  @Date: 2017-12-18 07:14:55 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 09:27:17
 */

class Session {
    private $_sessionID = NULL;

    
    public function __construct( $sessionID = NULL ) {
        if ( isset( $sessionID ) && $sessionID != NULL ) {
            
        } else {
            
        }
    }

    public function checkSession( ) {
        if ( $this->_sessionID != NULL ) {
            
        } else return false;
    }

    public function getSession( ) {
        if ( $this->_sessionID != NULL ) {
            
        } else return false;
    }
    
    public function killSession( ) {
        if ( $this->_sessionID != NULL ) {
            

            session_destroy();
        } else return false;
    }
}
?>
