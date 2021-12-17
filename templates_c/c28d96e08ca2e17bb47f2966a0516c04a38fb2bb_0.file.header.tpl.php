<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:40:26
  from 'D:\wamp64\www\prototipos\API\template\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4b0ab1e4f9_53049337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c28d96e08ca2e17bb47f2966a0516c04a38fb2bb' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\header.tpl',
      1 => 1637543159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/head.tpl' => 1,
  ),
),false)) {
function content_61ae4b0ab1e4f9_53049337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<header>
    <div class="logo">
        <h1>Presupuestador</h1>

    </div>
    <div class="container">
    <nav class="menu">
        <ul class="navigation">
            <li><a href="showProducts">Productos</a></li>
            <li><a href="showCategories">Categorias</a></li>
            <li><a href="category-csr">CategoriasCSR</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['email']->value != '') {?>
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "ADMIN" || $_smarty_tpl->tpl_vars['rol']->value == "SUPER-ADMIN") {?>
                    <li><a href="showUsers">Users</a></li>
                <?php }?>
                <li><a href="logout">Logout</a></li>
            <?php } else { ?>
                <li class="nav-item"><a href="login">Login</a></li>
            <?php }?>
        </ul>            
    </nav>
    </div>
    <i class="btn_menu fa fa-bars fa-lg" aria-hidden="true"></i>       
</header><?php }
}
