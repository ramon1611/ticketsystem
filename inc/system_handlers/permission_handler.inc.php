<?php
/**
 * File: permission_handler.inc.php
 * Project: inc
 * File Created: Thursday, 25th January 2018 8:22:58 am
 * Author: ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 4:48:00 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

/**
 * getPermissionsOfGroup()
 * 
 * @param int $groupID
 * @return mixed
 */
function getPermissionsOfGroup( int $groupID ) {
    if ( isset( $groupID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['permissions2groups'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['permissions2groups']['groupID'] ).' = '.$groupID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['permissions2groups']['permissionID']];

            if ( isset( $rList ) )
                return array_unique( $rList );
            else
                return NULL;
        } else
            return false;
    } else
        return false;
}

/**
 * getGroupsOfPermission()
 * 
 * @param int $permissionID
 * @return mixed
 */
function getGroupsOfPermission( int $permissionID ) {
    if ( isset( $permissionID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['permissions2groups'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['permissions2groups']['permissionID'] ).' = '.$groupID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['permissions2groups']['permissionID']];

            if ( isset( $rList ) )
                return array_unique( $rList );
            else
                return NULL;
        } else
            return false;
    } else
        return false;
}

/**
 * getPermissionsOfUser()
 * 
 * @param int $userID
 * @return mixed
 */
function getPermissionsOfUser( int $userID ) {
    if ( isset( $userID ) ) {
        $groupList = getGroupsOfUser( $userID );
        $rList = NULL;

        if ( isset( $groupList ) && $groupList != false ) {
            foreach ( $groupList as $groupID ) {
                if ( isset( $rList ) )
                    array_merge( $rList, getPermissionsOfGroup( $groupID ) );
                else
                    $rList = getPermissionsOfGroup( $groupID );
            }

            if ( isset( $rList ) )
                return array_unique( $rList );
            else
                return NULL;
        } else
            return false;
    } else
        return false;
}

/**
 * getUsersOfPermission()
 * 
 * @param int $permissionID
 * @return mixed
 */
function getUsersOfPermission( int $permissionID ) {
    if ( isset( $permissionID ) ) {
        $groupList = getGroupsOfPermission( $permissionID );
        $rList = NULL;

        if ( isset( $groupList ) && $groupList != false ) {
            foreach ( $groupList as $groupID ) {
                if ( isset( $rList ) )
                    array_merge( $rList, getUsersOfGroup( $groupID ) );
                else
                    $rList = getUsersOfGroup( $groupID );
            }

            if ( isset( $rList ) )
                return array_unique( $rList );
            else
                return NULL;
        } else
            return false;
    } else
        return false;
}
?>
