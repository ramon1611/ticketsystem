{* Smarty *}
<!DOCTYPE html>
<html>
    <head>
        <title>{$strings.{"login.title"}}{$settings.{"page.title.delimeter"}}{$strings.{"main.title.postfix"}}</title>

        {foreach from=$page.stylesheets item=stylesheet}
            <link rel="stylesheet" type="text/css" href="{$stylesheet}">
        {/foreach}
    </head>

    <body>
        <header>
            <span class="mainCaption">{$strings.{"main.caption"}}</span>
            <span class="pageCaption">{$strings.{"login.caption"}}</span>
        </header>

        <div class="loginBox">
            <div class="loginBoxHeader">
                <span class="loginBoxCaption">{$strings.{"login.loginBox.caption"}}</span>
            </div>

            <div class="loginBoxBody">
                <form action="{$settings.{"url.index.fileName"}}?handler=login_handler&action=login" method="post" name="login">
                <input name="login" value="true" type="hidden">
                    <div class="table">
                        <div class="tr">
                            <div class="td rightAlign">
                                <label for="username" class="clickable">{$strings.{"login.loginBox.usernameLabel"}}</label>
                            </div>
                            <div class="td fullWidth">
                                <input id="username" name="username" class="clickable" value="" autocorrect="off" autocapitalize="off" aria-required="true" type="text">
                            </div>
                        </div>

                        <div class="tr">
                            <div class="td rightAlign">
                                <label for="password" class="clickable">{$strings.{"login.loginBox.passwordLabel"}}</label>
                            </div>
                            <div class="td fullWidth">
                                <input id="password" name="password" class="clickable" value="" aria-required="true" type="password">
                            </div>
                        </div>
                    </div>

                    <input id="submit" name="submit" class="clickable" value="{$strings.{"login.loginBox.submitButton"}}" type="submit">
                </form>
            </div>
        </div>

        <a href="{$settings.{"url.index.fileName"}}?handler=login_handler&action=forgot">{$strings.{"login.forgotPassword"}}</a>
    </body>
</html>