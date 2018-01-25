<?php
/**
 * File: group_handler.inc.php
 * Project: inc
 * File Created: Thursday, 25th January 2018 9:33:24 am
 * Author: ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 4:50:23 pm
 * Modified By: ramon1611
 */

/**
 * getGroupsOfUser()
 * 
 * @param int $userID
 * @return mixed
 */
function getGroupsOfUser( int $userID ) {
    if ( isset( $userID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['users2groups'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['users2groups']['userID'] ).' = '.$userID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['users2groups']['groupID']];

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
 * getUsersOfGroup()
 * 
 * @param int $groupID
 * @return mixed
 */
function getUsersOfGroup( int $groupID ) {
    if ( isset( $groupID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['users2groups'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['users2groups']['groupID'] ).' = '.$groupID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['users2groups']['userID']];

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
