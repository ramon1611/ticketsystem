<?php
/**
 * File: ticket_handler.inc.php
 * Project: system_handlers
 * File Created: Thursday, 25th January 2018 4:41:52 pm
 * Author: ramon1611
 * -----
 * Last Modified: Friday, 26th January 2018 7:31:50 am
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( is_array( $GLOBALS['tickets'] ) || is_object( $GLOBALS['tickets'] ) )
foreach ( $GLOBALS['tickets'] as $ticketID => $ticketData ) {
    $labelList = getLabelsOfTicket( $ticketID );

    if ( isset( $labelList ) && $labelList )
        $GLOBALS['tickets'][$ticketID]['labels'] = $labelList;
}
?>
