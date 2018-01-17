<?php
/**
 * File: user.class.php
 * Project: Ticketsystem
 * File Created: Tuesday, 19th December 2017 12:44:29 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 17th January 2018 12:16:10 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

class User {
    private $_user = NULL;
    
    /**
     * User::__construct
     * 
     * Constructor
     */
    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if ( method_exists( $this, $method_name = '__construct'.$number_of_arguments ) )
            call_user_func_array( array( $this, $method_name ), $get_arguments );
        else 
            trigger_error( 'Method "'.$method_name.'" does not exist!', E_USER_ERROR );
    }

    /**
     * User::__construct0
     * 
     * @return void
     */
    private function __construct0(): void {
        
    }

    /**
     * User::__construct2
     *
     * Check user credentials
     * @param string $username
     * @param string $password
     * @return void
     */
    private function __construct2( string $username, string $password ): void {
        
    }

    /**
     * User::get
     * 
     * Get user data
     * @return mixed
     */
    public function get() {
        return $this->_user;
    }

}
?>
