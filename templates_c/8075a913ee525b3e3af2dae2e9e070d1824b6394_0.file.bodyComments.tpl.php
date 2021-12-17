<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:48:43
  from 'D:\wamp64\www\prototipos\API\template\bodyComments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4cfb0b4fa0_30581989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8075a913ee525b3e3af2dae2e9e070d1824b6394' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\bodyComments.tpl',
      1 => 1637718013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/head.tpl' => 1,
    'file:template/comments.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_61ae4cfb0b4fa0_30581989 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="product" product_id="<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" user_id="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" rol="<?php echo $_smarty_tpl->tpl_vars['rol']->value;?>
">
    <?php $_smarty_tpl->_subTemplateRender("file:template/comments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:template/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
