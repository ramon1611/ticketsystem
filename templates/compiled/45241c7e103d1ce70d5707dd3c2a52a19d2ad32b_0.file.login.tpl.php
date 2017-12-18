<?php
/* Smarty version 3.1.30, created on 2017-12-15 08:07:10
  from "C:\xampp\htdocs\ticket\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a33749ee33821_91482585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45241c7e103d1ce70d5707dd3c2a52a19d2ad32b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ticket\\templates\\login.tpl',
      1 => 1513321621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a33749ee33821_91482585 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.title"];
echo $_smarty_tpl->tpl_vars['settings']->value["page.title.delimeter"];
echo $_smarty_tpl->tpl_vars['strings']->value["main.title.postfix"];?>
</title>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value['stylesheets'], 'stylesheet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->value) {
?>
            <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
">
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </head>

    <body>
        <header>
            <span class="mainCaption"><?php echo $_smarty_tpl->tpl_vars['strings']->value["main.caption"];?>
</span>
            <span class="pageCaption"><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.caption"];?>
</span>
        </header>

        <div class="loginBox">
            <div class="loginBoxHeader">
                <span class="loginBoxCaption"><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.loginBox.caption"];?>
</span>
            </div>

            <div class="loginBoxBody">
                <form action="<?php echo $_smarty_tpl->tpl_vars['settings']->value["url.index.fileName"];?>
?handler=login_handler&action=login" method="post" name="login">
                <input name="login" value="true" type="hidden">
                    <div class="table">
                        <div class="tr">
                            <div class="td rightAlign">
                                <label for="username" class="clickable"><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.loginBox.usernameLabel"];?>
</label>
                            </div>
                            <div class="td fullWidth">
                                <input id="username" name="username" class="clickable" value="" autocorrect="off" autocapitalize="off" aria-required="true" type="text">
                            </div>
                        </div>

                        <div class="tr">
                            <div class="td rightAlign">
                                <label for="password" class="clickable"><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.loginBox.passwordLabel"];?>
</label>
                            </div>
                            <div class="td fullWidth">
                                <input id="password" name="password" class="clickable" value="" aria-required="true" type="password">
                            </div>
                        </div>
                    </div>

                    <input id="submit" name="submit" class="clickable" value="<?php echo $_smarty_tpl->tpl_vars['strings']->value["login.loginBox.submitButton"];?>
" type="submit">
                </form>
            </div>
        </div>

        <a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value["url.index.fileName"];?>
?handler=login_handler&action=forgot"><?php echo $_smarty_tpl->tpl_vars['strings']->value["login.forgotPassword"];?>
</a>
    </body>
</html><?php }
}
