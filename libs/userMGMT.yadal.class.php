<?php
/**
 * File: userMGMT.yadal.class.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 20th December 2017 9:51:33 am
 * Modified By: ramon1611
 */

$userData = array(
    'ID'            => NULL, // User ID
    'name'          => NULL, // User Name
    'mail'          => NULL, // User Mail
    'groups'        => NULL, // Array
    'permissions'   => NULL, // Array
    'sessions'      => NULL, // Array
    'activeSession' => NULL, // Currently Active Session
    'isEnabled'     => NULL, // True/False
    'isBanned'      => NULL, // True/False
    'banTime'       => NULL, // Ban Time in s
);


/**
 * 
 */
class userMGMT {
    private $_yadal = NULL;
    private $_tableName = 'users';
    private $_user = NULL;
    private $_cache = NULL;


    public function __construct( $yadal, $tabeleName = 'users' ) {
        $this->$_yadal = $yadal;
        $this->$_tableName = $tableName;
    }

    public function addUser( array $userData ) {
        $this->_yadal->query( '' );
    }

    public function editUser( ) {

    }

    public function deleteUser( ) {

    }

    public function enableUser( ) {

    }

    public function disableUser( ) {

    }

    public function banUser( ) {

    }

    public function debanUser( ) {

    }

    public function setUserGroups( ) {

    }

    public function newUserSession( ) {

    }

    public function killUserSession( ) {

    }

    public function killAllUserSessions( ) {

    }

    public function checkUserCredential( ) {

    }

    public function checkUserPermission( ) {

    }

    public function sendVerifyMail( ) {

    }

    public function getUserData( $user ) {
        if ( $user['ID'] != NULL & $user['name'] == NULL ) {
            $userID = $user['ID'];
        } elseif ( $user['ID'] == NULL & $user['name'] != NULL ) {
            $userName = $user['name'];
        } elseif ( $user['ID'] != NULL & $user['name'] != NULL ) {
            $userID = $user['ID'];
        } else
            return false;



        return array(
            'ID'            => $userID,
            'name'          => $userName,
            'mail'          => $userMail,
            'groups'        => getUserGroups($user),
            'permissions'   => getUserPermissions($user),
            'sessions'      => getUserSessions($user),
            'activeSession' => $activeSession,
            'isEnabled'     => $isEnabled,
            'isBanned'      => getUserBan($user)['isBanned'],
            'banTime'       => getUserBan($user)['banTime']
        );
    }

    public function getUserPermissions( ) {

    }

    public function getUserGroups( ) {

    }

    public function getUserBan( ) {

    }

    public function getUserSessions( ) {

    }

    public function addGroup( ) {

    }

    public function editGroupData( ) {

    }

    public function editGroupPermissions( ) {

    }

    public function deleteGroup( ) {

    }

    public function enableGroup( ) {

    }

    public function disableGroup( ) {

    }

    public function getGroup( ) {

    }

    public function getGroupPermissions( ) {

    }

    public function getGroupMembers( ) {
        
    }

    public function addPermission( ) {

    }

    public function editPermission( ) {

    }

    public function deletePermission( ) {

    }

    public function enablePermission( ) {

    }

    public function disablePermission( ) {

    }


    private function generateVerifyCode( ) {

    }
}

?>
