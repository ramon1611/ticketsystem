<?php
/**
 * File: page_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Sunday, 24th December 2017 7:08:28 am
 * Modified By: ramon1611
 */

if ( isset( $_GET['page'] ) || isset( $_GET['pageID'] ) )
    $pageParams = $_GET;
else
    $pageParams = array( 'page' => 'index' );

foreach ( $pageParams as $name => $value ) {
    if ( $name == 'page' ) {
        if ( isset( $page['items'][$value] ) ) {
            $page['ID']         = $page['items'][$value]['ID'];
            $page['name']       = $value;
            $page['title']      = $page['items'][$value]['displayName'].$settings['page.title.delimeter'].$strings['main.title.postfix'];
            $page['caption']    = $page['items'][$value]['displayName'];
            $page['href']       = $settings['url.index.fileName'].'?'.$settings['url.index.pageIdentifier'].'='.$page['items'][$value]['name'];

            $pageStyles = explode( ',', $page['items'][$value]['styles'] );
            foreach ( $pageStyles as $styleID )
                $page['styles'][$styleID] = $path['styles'].'/'.$styles[$styleID]['fileName'];
        } else
            trigger_error( 'Page "'.$value.'" does not exist!', E_USER_ERROR );
    }
}

?>
