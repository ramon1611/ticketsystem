<?php
/**
 * File: error_handler.inc.php
 * Project: user_handlers
 * File Created: Monday, 29th January 2018 4:25:40 pm
 * Author: ramon1611
 * -----
 * Last Modified: Monday, 29th January 2018 5:11:37 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

if ( isset( $_handlerAction ) ) {
    switch ( $_handlerAction ) {
        case 'noJS':
            trigger_error( $GLOBALS['strings']['errorhandler.messages.nojs'], E_USER_ERROR );
            break;
        
        default:
            trigger_error( $GLOBALS['strings']['errorhandler.messages.noaction'], E_USER_ERROR );
            break;
    }
} else
    trigger_error( '[error_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>
