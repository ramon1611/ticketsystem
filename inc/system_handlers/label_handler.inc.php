<?php
/**
 * File: label_handler.inc.php
 * Project: inc
 * File Created: Tuesday, 23rd January 2018 6:03:00 pm
 * Author: ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 4:46:14 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

/**
 * getLabelsOfTicket()
 * 
 * @param int $ticketID
 * @return mixed
 */

function getLabelsOfTicket( int $ticketID ) {
    if ( isset( $ticketID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['labels2tickets'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['labels2tickets']['ticketID'] ).' = '.$ticketID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['labels2tickets']['labelID']];

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
 * getTicketsOfLabel()
 * 
 * @param int $labelID
 * @return mixed
 */
function getTicketsOfLabel( int $labelID ) {
    if ( isset( $labelID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['labels2tickets'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['labels2tickets']['labelID'] ).' = '.$labelID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['labels2tickets']['ticketID']];

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
 * getLabelsOfKB()
 * 
 * @param int $kbID
 * @return mixed
 */
function getLabelsOfKB( int $kbID ) {
    if ( isset( $kbID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['labels2knowledgebase'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['labels2knowledgebase']['kbID'] ).' = '.$kbID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['labels2knowledgebase']['labelID']];

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
 * getKBsOfLabel()
 * 
 * @param int $labelID
 * @return mixed
 */
function getKBsOfLabel( int $labelID ) {
    if ( isset( $labelID ) ) {
        $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['labels2knowledgebase'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                    $GLOBALS['query']->where( $GLOBALS['db']->quote( $GLOBALS['columns']['labels2knowledgebase']['labelID'] ).' = '.$labelID ) );

        if ( $sql ) {
            $rList = NULL;

            while ( $result = $GLOBALS['db']->getRecord( $sql ) )
                if ( $result ) 
                    $rList[] = $result[$GLOBALS['columns']['labels2knowledgebase']['kbID']];

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
