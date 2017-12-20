<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: classLoader.inc.php
 *  @Date: 2017-12-20 08:35:58 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-20 08:41:30
 */

foreach ( $path['libs'] as $libName => $libPath ) {
    if ( file_exists( $libPath ) ) {
        require_once( $libPath );
    } else
        trigger_error( 'Class "'.$libName.'" could not be loaded!', E_USER_ERROR );
}

?>