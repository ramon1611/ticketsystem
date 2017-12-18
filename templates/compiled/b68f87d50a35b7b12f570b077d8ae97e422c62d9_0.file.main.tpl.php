<?php
/* Smarty version 3.1.30, created on 2017-12-14 11:32:19
  from "C:\xampp\htdocs\ticket\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a325333148d11_13321143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b68f87d50a35b7b12f570b077d8ae97e422c62d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ticket\\templates\\main.tpl',
      1 => 1513247535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:login.tpl' => 1,
  ),
),false)) {
function content_5a325333148d11_13321143 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['tpl_name']->value == 'login') {?>
    <?php $_smarty_tpl->_subTemplateRender("file:login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else { ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
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
            <span class="pageCaption"><?php echo $_smarty_tpl->tpl_vars['page']->value['caption'];?>
</span>

            <nav>
                <ul class="navbar">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value['items'], 'itemData', false, 'itemName');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemName']->value => $_smarty_tpl->tpl_vars['itemData']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['itemData']->value['viewInNav'] == true) {?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value["url.index.fileName"];?>
?<?php echo $_smarty_tpl->tpl_vars['settings']->value["url.index.pageIdentifier"];?>
=<?php echo $_smarty_tpl->tpl_vars['itemName']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['itemData']->value['displayName'];?>
</a></li>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </nav>
        </header>
        

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tpl_name']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


        <footer></footer>
    </body>
</html>
<?php }
}
}
