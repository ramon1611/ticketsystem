<?php
/**
 * File: load_database.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 3:19:25 pm
 * @author ramon1611
 * -----
 * Last Modified: Thursday, 25th January 2018 4:10:11 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

//* Load Config
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['settings'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
		if ( $result )
			$GLOBALS['settings'][$result[$GLOBALS['columns']['settings']['name']]] = $result[$GLOBALS['columns']['settings']['value']];
		else
			trigger_error( 'The setting could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['settings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No settings could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['settings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Pages
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['pages'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS, false ).' '.$GLOBALS['query']->order( array( $GLOBALS['db']->quote( $GLOBALS['columns']['pages']['order'] ) ) ) );
if ( $sql ) {
	while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
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
			trigger_error( 'The page could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['pages'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No pages could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['pages'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Strings
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['strings'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
		if ( $result )
			$GLOBALS['strings'][$result[$GLOBALS['columns']['strings']['name']]] = $result[$GLOBALS['columns']['strings']['value']];
		else
			trigger_error( 'The string could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['strings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No strings could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['strings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Stylesheets
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['styles'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
		if ( $result )
            $GLOBALS['styles'][$result[$GLOBALS['columns']['styles']['ID']]] = array(
                'name'      => $result[$GLOBALS['columns']['styles']['name']],
                'fileName'  => $result[$GLOBALS['columns']['styles']['fileName']]
            );
		else
			trigger_error( 'The stylesheet could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['styles'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No stylesheets could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['styles'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Sessions
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['sessions'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['session']['items'][$result[$GLOBALS['columns']['sessions']['ID']]] = array(
                'userID'    => $result[$GLOBALS['columns']['sessions']['userID']],
                'expire'    => $result[$GLOBALS['columns']['sessions']['expire']]
            );
        } else
            trigger_error( 'The session could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['sessions'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No sessions could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['sessions'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Tickets
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['tickets'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
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
            trigger_error( 'The ticket could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['tickets'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No tickets could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['tickets'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Labels
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['labels'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $id = $result[$GLOBALS['columns']['labels']['ID']];
            $bgColor = ( isset( $result[$GLOBALS['columns']['labels']['bg-color']] ) ) ?
                            $result[$GLOBALS['columns']['labels']['bg-color']] :
                            $GLOBALS['settings']['label.default.bg-color'];
            $textColor = ( isset( $result[$GLOBALS['columns']['labels']['text-color']] ) ) ?
                            $result[$GLOBALS['columns']['labels']['text-color']] :
                            $GLOBALS['settings']['label.default.text-color'];

            $GLOBALS['labels'][$id] = array(
                'name'          => $result[$GLOBALS['columns']['labels']['name']],
                'displayName'   => $result[$GLOBALS['columns']['labels']['displayName']],
                'bg-color'      => $bgColor,
                'text-color'    => $textColor
            );
        } else
            trigger_error( 'The label could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['labels'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No labels could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['labels'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Customers
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['customers'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['customers'][$result[$GLOBALS['columns']['customers']['ID']]] = array(
                'name'          => $result[$GLOBALS['columns']['customers']['name']],
                'contactPerson' => $result[$GLOBALS['columns']['customers']['contactPerson']]
            );
        } else
            trigger_error( 'The customer could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['customers'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No customers could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['customers'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Users
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['users'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['users']['items'][$result[$GLOBALS['columns']['users']['ID']]] = array(
                'name'          => $result[$GLOBALS['columns']['users']['name']],
                'mail'          => $result[$GLOBALS['columns']['users']['mail']],
                'profilePic'    => $result[$GLOBALS['columns']['users']['profilePic']],
                'passHash'      => $result[$GLOBALS['columns']['users']['passHash']]
            );
        } else
            trigger_error( 'The user could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['users'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No users could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['users'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Groups
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['groups'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['groups'][$result[$GLOBALS['columns']['groups']['ID']]] = array(
                'name'          => $result[$GLOBALS['columns']['groups']['name']],
                'displayName'   => $result[$GLOBALS['columns']['groups']['displayName']]
            );
        } else
            trigger_error( 'The group could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['groups'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No groups could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['groups'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Permissions
$sql = $GLOBALS['db']->query( $GLOBALS['query']->select( $GLOBALS['db']->quote( $GLOBALS['tables']['permissions'] ), $GLOBALS['query']::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $GLOBALS['db']->getRecord( $sql ) ) {
        if ( $result ) {
            $GLOBALS['permissions'][$result[$GLOBALS['columns']['permissions']['ID']]] = array(
                'name' => $result[$GLOBALS['columns']['permissions']['name']]
            );
        } else
            trigger_error( 'The permission could not be loaded from the database! [$GLOBALS["db"]->getRecord(@res:*|'.$GLOBALS['tables']['permissions'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No permissions could be retrieved from the database! [$GLOBALS["db"]->query(@query:*|'.$GLOBALS['tables']['permissions'].')]', E_USER_ERROR );
unset( $sql, $result );
?>
