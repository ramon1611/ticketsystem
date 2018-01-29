<?php
/**
 * File: label_handler.inc.php
 * Project: user_handlers
 * File Created: Thursday, 25th January 2018 4:21:49 pm
 * Author: ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 6:48:24 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $_handlerAction ) ) {
    switch ( $_handlerAction ) {
        case 'view':
            $labelID = $GLOBALS['pageParams']['labelID'];
            $pageName = 'viewLabel';
            
            $GLOBALS['page']['ID']         = $GLOBALS['page']['items'][$pageName]['ID'];
            $GLOBALS['page']['name']       = $pageName;
            $GLOBALS['page']['title']      = $GLOBALS['page']['items'][$pageName]['displayName'].$GLOBALS['settings']['page.title.delimeter'].$GLOBALS['strings']['main.title.postfix'];
            $GLOBALS['page']['caption']    = $GLOBALS['page']['items'][$pageName]['displayName'];
            $GLOBALS['page']['href']       = $GLOBALS['settings']['url.index.fileName'].'?'.$GLOBALS['settings']['url.index.handlerIdentifier'].'=label_handler&action=view&labelID='.$labelID;
            
            $pageStyles = explode( ',', $GLOBALS['page']['items'][$pageName]['styles'] );
            foreach ( $pageStyles as $styleID )
                $GLOBALS['page']['styles'][$styleID] = $GLOBALS['path']['styles'].'/'.$GLOBALS['styles'][$styleID]['fileName'];

            $pageScripts = explode( ',', $GLOBALS['page']['items'][$pageName]['scripts'] );
            foreach ( $pageScripts as $scriptID )
                $GLOBALS['page']['scripts'][$scriptID] = $GLOBALS['scripts'][$scriptID];

            $labelTickets = getTicketsOfLabel( $labelID );
            $labelKBs = getKBsOfLabel( $labelID );
            
            $GLOBALS['smarty']->assign( 'currentLabelID', $labelID );
            $GLOBALS['smarty']->assign( 'labelTickets', $labelTickets );
            $GLOBALS['smarty']->assign( 'labelKBs', $labelKBs );
            break;
        
        default:
            break;
    }    
} else
    trigger_error( '[label_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>
