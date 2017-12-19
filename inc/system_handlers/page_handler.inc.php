<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: page_handler.inc.php
 *  @Date: 2017-12-13 16:50:45 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-18 16:06:19
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