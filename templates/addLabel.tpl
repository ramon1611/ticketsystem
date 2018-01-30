{* Smarty *}
<form method="POST" action="{$settings.{"url.index.fileName"}}?{$settings.{"url.index.handlerIdentifier"}}=label_handler&action=add">
    <label for="labelName">Name: </label>
    <input name="labelName" type="text" value=""><br>

    <label for="displayName">Anzeigename: </label>
    <input name="displayName" type="text" value=""><br>

    <label for="bg-color">Hintergrundfarbe: </label>
    <input name="bg-color" type="text" value="#{$settings.{"label.default.bg-color"}}"><br>

    <label for="text-color">Textfarbe: </label>
    <input name="text-color" type="text" value="#{$settings.{"label.default.text-color"}}"><br>
</form>