{* Smarty *}
<div class="labelBox big" style="background-color: #{$labels[$currentLabelID].{"bg-color"}}; color: #{$labels[$currentLabelID].{"text-color"}};">
    {$labels[$currentLabelID].displayName}
</div>

<ul class="tableSelector">
    <li id="ticketsSelector" class="currentSelector"><a href="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.handlerIdentifier"}}=error_handler&action=noJS" onclick="sub_nav('tickets'); return false;">{$strings.{"label.view.selector.tickets"}}</a></li>
    <li id="kbsSelector"><a href="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.handlerIdentifier"}}=error_handler&action=noJS" onclick="sub_nav('kbs'); return false;">{$strings.{"label.view.selector.kb"}}</a></li>
</ul>

<div id="ticketsElement" class="table full currentElement">
    <div class="tr tr-header">
        <div class="td td-header">{$strings.{"ticket.overview.ticketID"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.from"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.subject"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.age"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.status"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.labels"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.owner"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.customerNumber"}}</div>
    </div>

    {foreach from=$labelTickets item=ticketID}
        <div class="tr">
            <div class="td">{$ticketID}</div>
            <div class="td">{$tickets[$ticketID].from}</div>
            <div class="td">{$tickets[$ticketID].subject}</div>
            <div class="td">{$tickets[$ticketID].timestamp}</div>
            <div class="td">{$tickets[$ticketID].status}</div>
            <div class="td">
                {foreach from=$tickets[$ticketID].labels item=labelID}
                    <a href="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.handlerIdentifier"}}=label_handler&action=view&labelID={$labelID}">
                        <div class="labelBox" style="background-color: #{$labels[$labelID].{"bg-color"}}; color: #{$labels[$labelID].{"text-color"}};">{$labels[$labelID].displayName}</div>
                    </a>
                {/foreach}
            </div>
            <div class="td">{$tickets[$ticketID].ownerID}</div>
            <div class="td">{$tickets[$ticketID].customerID}<br>{$customers[$tickets[$ticketID].customerID].name}</div>
        </div>
    {/foreach}
</div>

<div id="kbsElement" class="table full hidden">
    -- kbsTable --

    {foreach from=$labelKBs item=kbID}

    {/foreach}
</div>