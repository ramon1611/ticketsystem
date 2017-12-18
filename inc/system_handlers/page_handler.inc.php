<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: page_handler.inc.php
 *  @Date: 2017-12-13 16:50:45 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-14 09:40:52
 */
if ( isset( $_GET['page'] ) || isset( $_GET['pageID'] ) )
    $pageParams = $_GET;
else
    $pageParams = array( 'page' => 'index' );

foreach ( $pageParams as $name => $value ) {
    switch ( $name ) {
        case 'page':
            $page['ID']         = $page['items'][$value]['pageID'];
            $page['name']       = $value;
            $page['title']      = $page['items'][$value]['displayName'].$settings['page.title.delimeter'].$strings['main.title.postfix'];
            $page['caption']    = $page['items'][$value]['displayName'];
            $page['href']       = $settings['url.index.fileName'].'?'.$settings['url.index.pageIdentifier'].'='.$page['items'][$value]['name'];

            $styles = explode( ',', $page['items'][$value]['stylesheets'] );
            foreach ( $styles as $styleID )
                $page['stylesheets'][$styleID] = $path['stylesheets'].'/'.$stylesheets[$styleID]['fileName'];
            break;

        case 'pageID':
            $sql = $db->query( 'SELECT * FROM pages WHERE pageID=\''.$value.'\'' );
            if ( $sql ) {
                $result = $db->getRecord( $sql );

                if ( $result ) {
                    $page['ID']         = $result['pageID'];
                    $page['name']       = $result['name'];
                    $page['title']      = $result['displayName'].$settings['page.title.delimeter'].$settings['page.title.postfix'];
                    $page['caption']    = $result['displayName'];
                    $page['href']       = $settings['url.index.fileName'].'?'.$settings['url.index.pageIdentifier'].'='.$result['name'];
                } else
                    trigger_error( 'Die Seite konnte nicht aus der Datenbank geladen werden! [$db->getRecord(@res:'.$result['name'].')]', E_USER_ERROR );
            } else
                trigger_error( 'Es konnten keine Seiten aus der Datenbank abgerufen werden! [$db->query(@query:*|pages)]', E_USER_ERROR );
            unset( $sql, $result );
            break;

        default:
            break;
    }
}

?>