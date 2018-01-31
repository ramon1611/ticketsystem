<?php
/**
 * File: page_handler.inc.php
 * Project: Ticketsystem
 * File Created: Monday, 18th December 2017 1:04:58 pm
 * @author ramon1611
 * -----
 * Last Modified: Wednesday, 31st January 2018 9:09:41 am
 * Modified By: ramon1611
 */

namespace ramon1611;

const HREF_HANDLER = 0;
const HREF_PAGE = 1;
const HREF_DEFAULT = HREF_PAGE;

function setPage( array &$pageArr, array $pageData, int $hrefType = HREF_DEFAULT, string $handlerName = NULL, string $action = NULL ) {
    $pageArr['ID']          = $pageData['ID'];
    $pageArr['name']        = $pageData['name'];
    $pageArr['displayName'] = $pageData['displayName'];
    $pageArr['order']       = $pageData['order'];

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

function requirePageCode( string $pageName ) {
    $thisPath = $GLOBALS['path'].'/'.$pageName.'.inc.php';
    if ( file_exists( $thisPath ) ) {
        return require_once( $thisPath );
    } else
        return false;
}

$_handler = $GLOBALS['pageParams']['handler'];
if ( isset( $_handler ) ) {
    if ( isset( $GLOBALS['userHandlers'][$_handler] ) ) {
        foreach ( $GLOBALS['page']['items'] as $curPage ) {
            if ( $curPage['ID'] == $GLOBALS['userHandlers'][$_handler]['pageID'] )
                setPage( $GLOBALS['page'], $curPage, HREF_HANDLER, $_handler, $GLOBALS['pageParams']['action'] );
        }
    } else
        trigger_error( 'Handler "'.$GLOBALS['pageParams']['handler'].'" does not exist!', E_USER_ERROR );
} else {
    if ( !isset( $GLOBALS['pageParams']['page'] ) )
        $GLOBALS['pageParams']['page'] = 'index';
    
    foreach ( $GLOBALS['pageParams'] as $name => $value ) {
        if ( $name == 'page' ) {
            if ( isset( $GLOBALS['page']['items'][$value] ) ) {
                setPage( $GLOBALS['page'], $GLOBALS['page']['items'][$value] );
                requirePageCode( $value );
            } else
                trigger_error( 'Page "'.$value.'" does not exist!', E_USER_ERROR );
        }
    }
}
?>
