<?php
/**
 * File: user.class.php
 * Project: Ticketsystem
 * File Created: Tuesday, 19th December 2017 12:44:29 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 17th January 2018 4:31:05 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

class User {
    private $_id = NULL;
    private $_name = NULL;
    private $_mail = NULL;
    private $_passwordHash = NULL;
    
    /**
     * __construct
     * 
     * Constructor
     * @param void
     * @return void
     */
    public function __construct( array $userData = NULL ) {
        if ( isset( $userData ) )
            $this->set( $userData );
    }

    /**
     * User::set
     * 
     * Set user data
     * @param array $userData
     * @return bool
     */
    public function set( array $userData ) {
        if ( isset( $userData ) ) {
            if ( isset( $userData['id'], $userData['name'], $userData['mail'], $userData['passwordHash'] ) ) {
                $this->_id              = $userData['id'];
                $this->_name            = $userData['name'];
                $this->_mail            = $userData['mail'];
                $this->_passwordHash    = $userData['passwordHash'];

                return true;
            } else
                return false;
        } else
            return false;
    }

    /**
     * User::get
     * 
     * Get user data
     * @param void
     * @return array
     */
    public function get() {
        return array(
            'id'            => $this->_id,
            'name'          => $this->_name,
            'mail'          => $this->_mail,
            'passwordHash'  => $this->_passwordHash
        );
    }

    /**
     * User::checkCredential
     * 
     * Check user credential
     * @param string $password
     * @return bool
     */
    public function checkCredential( string $password ) {
        return password_verify( $password, $this->_passwordHash );
    }
}
?>
