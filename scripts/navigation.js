function sub_nav( origin ) {
    var originSelector = document.getElementById( origin+'Selector' );
    var originElement  = document.getElementById( origin+'Element' );

    var activeSelectors = document.getElementsByClassName( 'currentSelector' );
    var activeElements = document.getElementsByClassName( 'currentElement' );

    for ( var item of activeSelectors )
        item.classList.remove( 'currentSelector' );

    for ( var item of activeElements ) {
        item.classList.add( 'hidden' );
        item.classList.remove( 'currentElement' );
    };

    originSelector.classList.add( 'currentSelector' );
    originElement.classList.remove( 'hidden' );
    originElement.classList.add( 'currentElement' );

    return false;
}