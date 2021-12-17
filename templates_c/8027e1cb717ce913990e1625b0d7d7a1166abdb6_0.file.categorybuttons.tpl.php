<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:40:26
  from 'D:\wamp64\www\prototipos\API\template\categorybuttons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4b0ab84cf1_17531666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8027e1cb717ce913990e1625b0d7d7a1166abdb6' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\categorybuttons.tpl',
      1 => 1637447011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ae4b0ab84cf1_17531666 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container"> 
    <div class="col-2 m-1">
        <a href=""><button class="w-100 btn btn-sm btn-success" >TODOS</button></a>
    </div> 
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <div class="col-2 m-1">
            <a href="Search/<?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
" ><button class="w-100 btn btn-sm btn-success" ><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</button></a>
        </div>        
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
