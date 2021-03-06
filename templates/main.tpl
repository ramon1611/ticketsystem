{* Smarty *}
<!DOCTYPE html>
<html>
    <head>
        <title>{$page.displayName}{$settings.{"page.title.delimeter"}}{$strings.{"main.title.suffix"}}</title>

        {foreach from=$page.styles item=stylesheet}
            <link rel="stylesheet" type="text/css" href="{$stylesheet}">
        {/foreach}

        {foreach from=$page.scripts item=script}
            <script type="{$script.type}" src="{$script.src}" {if $script.isAsync == true}async{/if}></script>
        {/foreach}
    </head>

    <body>
        <header>
            <span class="mainCaption">{$strings.{"main.caption"}}</span>
            <span class="pageCaption">{$page.displayName}</span>

            <nav>
                <ul class="navbar">
                    {foreach from=$page.items item=itemData key=itemName}
                        {if $itemData.viewInNav == true}
                            <li><a href="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.pageIdentifier"}}={$itemName}">{$itemData.displayName}</a></li>
                        {/if}
                    {/foreach}
                </ul>
            </nav>
        </header>
        
        {include file="$tpl_name.tpl"}

        <footer></footer>
    </body>
</html>
