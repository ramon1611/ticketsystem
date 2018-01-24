<?php
/**
 * File: class_loader.inc.php
 * Project: Ticketsystem
 * File Created: Wednesday, 20th December 2017 8:35:54 am
 * Author: ramon1611
 * -----
 * Last Modified: Wednesday, 24th January 2018 5:37:49 pm
 * Modified By: ramon1611
 */

namespace ramon1611;

foreach ( $GLOBALS['path']['libs'] as $libName => $libPath ) {
    if ( file_exists( $libPath ) ) {
        require_once( $libPath );
    } else
        trigger_error( 'Class "'.$libName.'" could not be loaded!', E_USER_ERROR );
}

?>
