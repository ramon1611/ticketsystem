<?php
/**
 * File: ticket_handler.inc.php
 * Project: system_handlers
 * File Created: Thursday, 25th January 2018 4:41:52 pm
 * Author: ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 4:42:00 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( is_array( $GLOBALS['tickets'] ) || is_object( $GLOBALS['tickets'] ) )
foreach ( $GLOBALS['tickets'] as $ticketID => $ticketData ) {
    $labelList = getLabelsOfTicket( $ticketID );

    if ( isset( $labelList ) && $labelList )
        $GLOBALS['tickets'][$ticketID]['labels'] = $labelList;
    else
        trigger_error( 'No labels could be assigned to the tickets!', E_USER_ERROR );
}
?>
