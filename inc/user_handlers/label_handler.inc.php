<?php
/**
 * File: label_handler.inc.php
 * Project: user_handlers
 * File Created: Thursday, 25th January 2018 4:21:49 pm
 * Author: ramon1611
 * -----
 * Last Modified: Tuesday, 30th January 2018 9:19:53 am
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $_handlerAction ) ) {
    if ( isset( $GLOBALS['pageParams']['labelID'] ) ) {
        $labelID = $GLOBALS['pageParams']['labelID'];

        switch ( $_handlerAction ) {
            case 'view':
                $labelTickets = getTicketsOfLabel( $labelID );
                $labelKBs = getKBsOfLabel( $labelID );
                
                $GLOBALS['smarty']->assign( 'action', $_handlerAction );
                $GLOBALS['smarty']->assign( 'currentLabelID', $labelID );
                $GLOBALS['smarty']->assign( 'labelTickets', $labelTickets );
                $GLOBALS['smarty']->assign( 'labelKBs', $labelKBs );
                break;

            case 'addForm':
            
                $GLOBALS['smarty']->assign( 'action', $_handlerAction );
                break;

            case 'add':

                break;
            
            case 'editForm':

                $GLOBALS['smarty']->assign( 'action', $_handlerAction );
                $GLOBALS['smarty']->assign( 'currentLabelID', $labelID );
                break;

            case 'edit':

                break;

            case 'deleteForm':
            
                $GLOBALS['smarty']->assign( 'action', $_handlerAction );
                $GLOBALS['smarty']->assign( 'currentLabelID', $labelID );
                break;

            case 'delete':

                break;
            
            default:
                trigger_error( '[label_handler] Action "'.$_handlerAction.'" not provided!', E_USER_ERROR );
                break;
        }
    } else
        trigger_error( '[label_handler] labelID is not given!', E_USER_ERROR );
} else
    trigger_error( '[label_handler] A user handler can not be used without an action!', E_USER_ERROR );
?>
