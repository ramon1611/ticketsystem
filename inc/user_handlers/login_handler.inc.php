<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: login_handler.inc.php
 *  @Date: 2017-12-14 16:45:53 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-19 13:06:03
 */

if ( isset( $_handlerAction ) ) {
    
} else
    trigger_error( '[login_handler] A user handler can not be used without an action!', E_USER_WARNING );
?>