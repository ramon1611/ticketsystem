<?php
/**
 * File: load_database.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 3:19:25 pm
 * @author ramon1611
 * -----
 * Last Modified: Sunday, 24th December 2017 7:10:18 am
 * Modified By: ramon1611
 */
//* Load Config
$sql = $db->query( $query->select( $tables['settings'], $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$settings[$result[$columns['settings']['name']]] = $result[$columns['settings']['value']];
		else
			trigger_error( 'The setting could not be loaded from the database! [$db->getRecord(@res:*|'.$tables['settings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No settings could be retrieved from the database! [$db->query(@query:*|'.$tables['settings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Pages
$sql = $db->query( $query->select( $tables['pages'], $query::SELECT_ALL_COLUMNS, false ).' '.$query->order( array($columns['pages']['ID']) ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result ) {
			$page['items'][$result[$columns['pages']['name']]] = array(
                'ID'            => $result[$columns['pages']['ID']],
                'name'          => $result[$columns['pages']['name']],
                'displayName'   => $result[$columns['pages']['displayName']],
                'styles'        => $result[$columns['pages']['styles']],
                'viewInNav'     => $result[$columns['pages']['viewInNav']]
            );
        } else
			trigger_error( 'The page could not be loaded from the database! [$db->getRecord(@res:*|'.$tables['pages'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No pages could be retrieved from the database! [$db->query(@query:*|'.$tables['pages'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Strings
$sql = $db->query( $query->select( $tables['strings'], $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$strings[$result[$columns['strings']['name']]] = $result[$columns['strings']['value']];
		else
			trigger_error( 'The string could not be loaded from the database! [$db->getRecord(@res:*|'.$tables['strings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No strings could be retrieved from the database! [$db->query(@query:*|'.$tables['strings'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Stylesheets
$sql = $db->query( $query->select( $tables['styles'], $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
            $styles[$result[$columns['styles']['ID']]] = array(
                'name'      => $result[$columns['styles']['name']],
                'fileName'  => $result[$columns['styles']['fileName']]
            );
		else
			trigger_error( 'The stylesheet could not be loaded from the database! [$db->getRecord(@res:*|'.$tables['styles'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'No stylesheets could be retrieved from the database! [$db->query(@query:*|'.$tables['styles'].')]', E_USER_ERROR );
unset( $sql, $result );

//* Load Sessions
$sql = $db->query( $query->select( $tables['sessions'], $query::SELECT_ALL_COLUMNS ) );
if ( $sql ) {
    while ( $result = $db->getRecord( $sql ) ) {
        if ( $result ) {
            $sessions['items'][$result[$columns['sessions']['ID']]] = array(
                'userID'    => $result[$columns['sessions']['userID']],
                'expire'    => $result[$columns['sessions']['expire']]
            );
        } else
            trigger_error( 'The session could not be loaded from the database! [$db->getRecord(@res:*|'.$tables['sessions'].')]', E_USER_ERROR );
    }
} else
    trigger_error( 'No sessions could be retrieved from the database! [$db->query(@query:*|'.tables['sessions'].')]', E_USER_ERROR );
unset( $sql, $result );
?>
