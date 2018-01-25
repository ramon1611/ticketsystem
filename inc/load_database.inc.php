<?php
/**
 * File: load_database.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 3:19:25 pm
 * @author ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 3:19:34 am
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Load Config
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['settings'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$GLOBALS['settings'][$result[$GLOBALS['columns']['settings']['name']]] = $result[$GLOBALS['columns']['settings']['value']];
		else
			trigger_error( 'The setting could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['settings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No settings could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['settings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Pages
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['pages'] ), $query::SELECT_ALL_COLUMNS, false ).' '.$query->where( '('.$db->quote( $GLOBALS['columns']['pages']['viewInNav'] ).' = 1 AND '.$db->quote( $GLOBALS['columns']['pages']['order'] ).' IS NOT NULL)', false ).' '.$query->order( array( $db->quote( $GLOBALS['columns']['pages']['order'] ) ) ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result ) {
			$GLOBALS['page']['items'][$result[$GLOBALS['columns']['pages']['name']]] = array(
                'ID'            => $result[$GLOBALS['columns']['pages']['ID']],
                'name'          => $result[$GLOBALS['columns']['pages']['name']],
                'displayName'   => $result[$GLOBALS['columns']['pages']['displayName']],
                'styles'        => $result[$GLOBALS['columns']['pages']['styles']],
                'viewInNav'     => $result[$GLOBALS['columns']['pages']['viewInNav']],
                'order'         => $result[$GLOBALS['columns']['pages']['order']]
            );
        } else
			trigger_error( 'The page could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['pages'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No pages could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['pages'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Strings
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['strings'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$GLOBALS['strings'][$result[$GLOBALS['columns']['strings']['name']]] = $result[$GLOBALS['columns']['strings']['value']];
		else
			trigger_error( 'The string could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['strings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No strings could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['strings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Stylesheets
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['styles'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
            $GLOBALS['styles'][$result[$GLOBALS['columns']['styles']['ID']]] = array(
                'name'      => $result[$GLOBALS['columns']['styles']['name']],
                'fileName'  => $result[$GLOBALS['columns']['styles']['fileName']]
            );
		else
			trigger_error( 'The stylesheet could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['styles'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No stylesheets could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['styles'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Sessions
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['sessions'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $db->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['session']['items'][$result[$GLOBALS['columns']['sessions']['ID']]] = array(
                'userID'    => $result[$GLOBALS['columns']['sessions']['userID']],
                'expire'    => $result[$GLOBALS['columns']['sessions']['expire']]
            );
        } else
            trigger_error( 'The session could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['sessions'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No sessions could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['sessions'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Tickets
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['tickets'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $db->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['tickets'][$result[$GLOBALS['columns']['tickets']['ID']]] = array(
                'from'          => $result[$GLOBALS['columns']['tickets']['from']],
                'subject'       => $result[$GLOBALS['columns']['tickets']['subject']],
                'timestamp'     => $result[$GLOBALS['columns']['tickets']['timestamp']],
                'ownerID'       => $result[$GLOBALS['columns']['tickets']['ownerID']],
                'customerID'    => $result[$GLOBALS['columns']['tickets']['customerID']],
                'status'        => $result[$GLOBALS['columns']['tickets']['status']]
            );
        } else
            trigger_error( 'The ticket could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['tickets'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No tickets could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['tickets'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Labels
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['labels'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $db->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['labels'][$result[$GLOBALS['columns']['labels']['ID']]] = array(
                'name'          => $result[$GLOBALS['columns']['labels']['name']],
                'dislpayName'   => $result[$GLOBALS['columns']['labels']['displayName']]
            );
        } else
            trigger_error( 'The label could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['labels'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No labels could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['labels'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Customers
$sql = $db->query( $query->select( $db->quote( $GLOBALS['tables']['customers'] ), $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $db->getRecord( $sql ) ) {
        if ( $result ) {
            $customers[$result[$GLOBALS['columns']['customers']['ID']]] = array(
                'name'          => $result[$GLOBALS['columns']['customers']['name']],
                'contactPerson' => $result[$GLOBALS['columns']['customers']['contactPerson']]
            );
        } else
            trigger_error( 'The customer could not be loaded from the database! [$db->getRecord(@res:*|'.$GLOBALS['tables']['customers'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No customers could be retrieved from the database! [$db->query(@query:*|'.$GLOBALS['tables']['customers'].')]', E_USER_ERROR );
unset( $sql, $result );
?>
