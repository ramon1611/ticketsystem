<?php
/**
 * File: labels.inc.php
 * Project: inc
 * File Created: Tuesday, 23rd January 2018 6:03:00 pm
 * Author: ramon1611
 * -----
 * Last Modified: Tuesday, 23rd January 2018 7:32:02 pm
 * Modified By: ramon1611
 */

/**
 * getLabelsOfTicket
 * 
 * @param int $ticketID
 * @return mixed
 */

function getLabelsOfTicket( int $ticketID ) {
    $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['tables']['labels2tickets'], $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                  $GLOBALS['query']->where( $GLOBALS['columns']['labels2tickets']['ticketID'].' = '.$ticketID ) );

    if ( $sql ) {
        $labelList = NULL;

        while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
            if ( $result ) 
                $labelList[] = $result[$GLOBALS['columns']['labels2tickets']['labelID']];
            else
                return false;
        }

        return $labelList;
    } else
        return $GLOBALS['query']->select( $GLOBALS['tables']['labels2tickets'], $GLOBALS['query']::SELECT_ALL_COLUMNS, false ) .
        $GLOBALS['query']->where( $GLOBALS['columns']['labels2tickets']['ticketID'].' = '.$ticketID );
}

/**
 * getTicketsOfLabel
 * 
 * @param int $labelID
 * @return mixed
 */
function getTicketsOfLabel( int $labelID ) {
    $sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['tables']['labels2tickets'], $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.
                                  $GLOBALS['query']->where( $GLOBALS['columns']['labels2tickets']['labelID'].' = '.$labelID ) );

    if ( $sql ) {
        $ticketList = NULL;

        while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
            if ( $result ) 
                $ticketList[] = $result[$GLOBALS['columns']['labels2tickets']['ticketID']];
            else
                return false;
        }

        return $ticketList;
    } else
        return false;
}
?>
