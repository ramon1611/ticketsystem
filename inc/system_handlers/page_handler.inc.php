<?php
/**
 * File: page_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Tuesday, 30th January 2018 9:02:44 am
 * Modified By: ramon1611
 */

namespace ramon1611;

const HREF_HANDLER = 0;
const HREF_PAGE = 1;
const HREF_DEFAULT = HREF_PAGE;

function setPage( array &$pageArr, array $pageData, string $pageTitleSuffix, int $hrefType = HREF_DEFAULT, string $handlerName = NULL, string $action = NULL ) {
    $pageArr['ID']      = $pageData['ID'];
    $pageArr['name']    = $pageData['name'];
    $pageArr['title']   = $pageData['displayName'].$pageTitleSuffix;
    $pageArr['caption'] = $pageData['displayName'];

    if ( !isset( $handlerName ) && isset( $_GET['handler'] ) ) $handlerName = $_GET['handler'];
    if ( !isset( $action ) && isset( $_GET['action'] ) ) $action = $_GET['action'];

    switch ( $hrefType ) {
        case HREF_HANDLER && isset( $handlerName, $action ):
            $pageArr['href'] = $GLOBALS['settings']['url.index.fileName'].'?'.$GLOBALS['settings']['url.index.handlerIdentifier'].'='.$handlerName.'&action='.$action;
            break;

        case HREF_PAGE:
            $pageArr['href'] = $GLOBALS['settings']['url.index.fileName'].'?'.$GLOBALS['settings']['url.index.pageIdentifier'].'='.$pageData['name'];
            break;
        
        default:
            return false;
            break;
    }

    $pageStyles = explode( ',', $pageData['styles'] );
    $pageArr['styles'] = [];
    foreach ( $pageStyles as $styleID ) {
        $pageArr['styles'][$styleID] = $GLOBALS['path']['styles'].'/'.$GLOBALS['styles'][$styleID]['fileName'];
    }

    $pageScripts = explode( ',', $pageData['scripts'] );
    $pageArr['scripts'] = [];
    foreach ( $pageScripts as $scriptID )
        $pageArr['scripts'][$scriptID] = $GLOBALS['scripts'][$scriptID];

    return true;
}

$_handler = $GLOBALS['pageParams']['handler'];
if ( isset( $_handler ) ) {
    if ( isset( $GLOBALS['userHandlers'][$_handler] ) ) {
        foreach ( $GLOBALS['page']['items'] as $curPage ) {
            if ( $curPage['ID'] == $GLOBALS['userHandlers'][$_handler]['pageID'] ) {
                $suffix = $GLOBALS['settings']['page.title.delimeter'].$GLOBALS['strings']['main.title.postfix'];
                setPage( $GLOBALS['page'], $curPage, $suffix, HREF_HANDLER, $_handler, $GLOBALS['pageParams']['action'] );
            }
        }
    } else
        trigger_error( 'Handler "'.$GLOBALS['pageParams']['handler'].'" does not exist!', E_USER_ERROR );
} else {
    if ( !isset( $GLOBALS['pageParams']['page'] ) && !isset( $GLOBALS['pageParams']['pageID'] ) )
        $GLOBALS['pageParams']['page'] = 'index';
    
    foreach ( $GLOBALS['pageParams'] as $name => $value ) {
        if ( $name == 'page' ) {
            if ( isset( $GLOBALS['page']['items'][$value] ) ) {
                $suffix = $GLOBALS['settings']['page.title.delimeter'].$GLOBALS['strings']['main.title.postfix'];
                setPage( $GLOBALS['page'], $GLOBALS['page']['items'][$value], $suffix );
            } else
                trigger_error( 'Page "'.$value.'" does not exist!', E_USER_ERROR );
        }
    }
}
?>
