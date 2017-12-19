<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: loadDB.inc.php
 *  @Date: 2017-12-18 15:20:09 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-18 16:03:57
 */
// Load Config
$sql = $db->query( 'SELECT * FROM '.$tables['settings'] );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$settings[$result[$columns['settings']['name']]] = $result[$columns['settings']['value']];
		else
			trigger_error( 'Die Einstellung konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:*|'.$tables['settings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Einstellungen aus der Datenbank abgerufen werden! [$db->query(@query:*|'.$tables['settings'].')]', E_USER_ERROR );
unset( $sql, $result );

// Load Pages
$sql = $db->query( 'SELECT * FROM '.$tables['pages'].' ORDER BY '.$columns['pages']['ID'].' ASC' );
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
			trigger_error( 'Die Seite konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:*|'.$tables['pages'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Seiten aus der Datenbank abgerufen werden! [$db->query(@query:*|'.$tables['pages'].')]', E_USER_ERROR );
unset( $sql, $result );

// Load Strings
$sql = $db->query( 'SELECT * FROM '.$tables['strings'] );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
			$strings[$result[$columns['strings']['name']]] = $result[$columns['strings']['value']];
		else
			trigger_error( 'Die Zeichenfolge konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:*|'.$tables['strings'].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Zeichenfolgen aus der Datenbank abgerufen werden! [$db->query(@query:*|'.$tables['strings'].')]', E_USER_ERROR );
unset( $sql, $result );

// Load Stylesheets
$sql = $db->query( 'SELECT * FROM '.$tables['styles'] );
if ( $sql ) {
	while ( $result = $db->getRecord( $sql ) ) {
		if ( $result )
            $styles[$result[$columns['styles']['ID']]] = array(
                'name'      => $result[$columns['styles']['name']],
                'fileName'  => $result[$columns['styles']['fileName']]
            );
		else
			trigger_error( 'Das Stylesheet konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result[$columns['styles']['name']].')]', E_USER_ERROR );
	}
} else
	trigger_error( 'Es konnten keine Stylesheets aus der Datenbank abgerufen werden! [$db->query(@query:*|'.$tables['styles'].')]', E_USER_ERROR );
unset( $sql, $result );
?>