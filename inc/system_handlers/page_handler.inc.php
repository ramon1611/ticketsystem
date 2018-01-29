<?php
/**
 * File: page_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 7:00:26 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $GLOBALS['pageParams']['handler'] ) ) {
    if ( isset( $GLOBALS['userHandlers'][$GLOBALS['pageParams']['handler']] ) ) {
        //TODO: fetch page for user handler...
    } else
        trigger_error( 'Handler "'.$GLOBALS['pageParams']['handler'].'" does not exist!', E_USER_ERROR );
}


if ( !isset( $GLOBALS['pageParams']['page'] ) && !isset( $GLOBALS['pageParams']['pageID'] ) )
    $GLOBALS['pageParams']['page'] = 'index';

foreach ( $GLOBALS['pageParams'] as $name => $value ) {
    if ( $name == 'page' ) {
        if ( isset( $GLOBALS['page']['items'][$value] ) ) {
            $GLOBALS['page']['ID']         = $GLOBALS['page']['items'][$value]['ID'];
            $GLOBALS['page']['name']       = $value;
            $GLOBALS['page']['title']      = $GLOBALS['page']['items'][$value]['displayName'].$GLOBALS['settings']['page.title.delimeter'].$GLOBALS['strings']['main.title.postfix'];
            $GLOBALS['page']['caption']    = $GLOBALS['page']['items'][$value]['displayName'];
            $GLOBALS['page']['href']       = $GLOBALS['settings']['url.index.fileName'].'?'.$GLOBALS['settings']['url.index.pageIdentifier'].'='.$GLOBALS['page']['items'][$value]['name'];

            $pageStyles = explode( ',', $GLOBALS['page']['items'][$value]['styles'] );
            foreach ( $pageStyles as $styleID )
                $GLOBALS['page']['styles'][$styleID] = $GLOBALS['path']['styles'].'/'.$GLOBALS['styles'][$styleID]['fileName'];

            $pageScripts = explode( ',', $GLOBALS['page']['items'][$value]['scripts'] );
            foreach ( $pageScripts as $scriptID )
                $GLOBALS['page']['scripts'][$scriptID] = $GLOBALS['scripts'][$scriptID];
        } else
            trigger_error( 'Page "'.$value.'" does not exist!', E_USER_ERROR );
    }
}
?>
