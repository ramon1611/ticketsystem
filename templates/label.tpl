{* Smarty *}
{switch $action}
    {case "view" break}
        {include file="viewLabel.tpl"}
    {case "addForm" break}
        {include file="addLabel.tpl"}
    {case "editForm" break}
        {include file="editLabel.tpl"}
    {case "deleteForm" break}
        {include file="deleteLabel.tpl"}
    {default break}
        {include file="viewLabel.tpl"}
{/switch}
