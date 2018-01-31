<?php

namespace ramon1611;
/**
 * File: label.inc.php
 * Project: pages
 * File Created: Wednesday, 31st January 2018 9:26:17 am
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 31st January 2018 9:37:10 am
 * Modified By: ramon1611
 */

if ( isset( $GLOBALS['pageParams']['labelID'] ) ) {
    $labelID = $GLOBALS['pageParams']['labelID'];
    $thisLabels = loadLabelsFromDB();

    if ( $labels ) {
        $labelTickets = getTicketsOfLabel( $labelID );
        $labelKBs = getKBsOfLabel( $labelID );
        
        $GLOBALS['smarty']->assign( 'labels', $thisLabels );
        $GLOBALS['smarty']->assign( 'currentLabelID', $labelID );
        $GLOBALS['smarty']->assign( 'labelTickets', $labelTickets );
        $GLOBALS['smarty']->assign( 'labelKBs', $labelKBs );
    } else
        trigger_error( '[page.label] No labels could be retrieved from the database!', E_USER_ERROR );
} else
    trigger_error( '[page.label] labelID is not given!', E_USER_ERROR );
?>
