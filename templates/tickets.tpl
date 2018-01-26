{* Smarty *}
<ul class="tableSelector">
    <li><a href="#">{$strings.{"ticket.overview.selector.viewAllTickets"}}</a></li>
    <li><a href="#">{$strings.{"ticket.overview.selector.viewOpenTickets"}}</a></li>
    <li><a href="#">{$strings.{"ticket.overview.selector.viewClosedTickets"}}</a></li>
    <li><a href="#">{$strings.{"ticket.overview.selector.viewHiddenTickets"}}</a></li>
</ul>

<div class="table full">
    <div class="tr tr-header">
        <div class="td td-header"><input type="checkbox" name="all-ticket-id" title="{$strings.{"ticket.overview.selectAll"}}"></div>
        <div class="td td-header">{$strings.{"ticket.overview.ticketID"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.from"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.subject"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.age"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.status"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.labels"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.owner"}}</div>
        <div class="td td-header">{$strings.{"ticket.overview.customerNumber"}}</div>
    </div>

    {foreach from=$tickets item=ticketData key=ticketID}
        <div class="tr">
            <div class="td"><input type="checkbox" name="ticket-id" value="{$ticketID}" title="{$strings.{"ticket.overview.selectSingle"}}"></div>
            <div class="td">{$ticketID}</div>
            <div class="td">{$ticketData.from}</div>
            <div class="td">{$ticketData.subject}</div>
            <div class="td">{$ticketData.timestamp}</div>
            <div class="td">{$ticketData.status}</div>
            <div class="td">
                {foreach from=$ticketData.labels item=labelID}
                    <a href="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.handlerIdentifier"}}=label_handler&action=view&labelID={$labelID}">
                        <div class="labelBox" style="background-color: #{$labels[$labelID].{"bg-color"}}; color: #{$labels[$labelID].{"text-color"}};">{$labels[$labelID].displayName}</div>
                    </a>
                {/foreach}
            </div>
            <div class="td">{$ticketData.ownerID}</div>
            <div class="td">{$ticketData.customerID}<br>{$customers[$ticketData.customerID].name}</div>
        </div>
    {/foreach}
</div>