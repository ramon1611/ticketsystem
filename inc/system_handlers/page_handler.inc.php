<?php
/**
 * File: page_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 24th January 2018 5:48:34 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $_GET['page'] ) || isset( $_GET['pageID'] ) )
    $pageParams = $_GET;
else
    $pageParams = array( 'page' => 'index' );

foreach ( $pageParams as $name => $value ) {
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
        } else
            trigger_error( 'Page "'.$value.'" does not exist!', E_USER_ERROR );
    }
}

?>
