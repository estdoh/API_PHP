<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:43:11
  from 'D:\wamp64\www\prototipos\API\template\body-categoriesCSR.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4bafe28d85_00376908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b2b1ae3ce6d1936cc51e5e8f8ec55a936b7b5d6' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\body-categoriesCSR.tpl',
      1 => 1637718013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/head.tpl' => 1,
    'file:template/vue/categoryList.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_61ae4bafe28d85_00376908 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="inicio">
                <h3>Carga de datos para <b>administrador</b></h3>
    </div>    

    <div class="container">        
        <div class="col-1 m-1">
            <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
        </div>               
    
        <div class="col-12 p-4 border rounded-3 bg-light agregarcliente"> 
            <form  class="col-12" id="form-products" action="InsertCategory" method="POST" autocomplete="on">                
                <div class="form-group col-10 mb-3">
                    <div class="form-floating col">
                        <input name="input_name" id="input_name" type="text" class="form-control" placeholder="Nombre">
                        <label for="name"><p>Name</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_description" id="input_description" type="text" class="form-control" placeholder="Descripcion">
                        <label for="description"><p>Descripcion</p></label>
                    </div>

                </div>  
               
                <div class="form-floating mb-2 col-2">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                    </div>
                </div>
            </form>
            
        </div>         
    </div>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">
            <?php $_smarty_tpl->_subTemplateRender('file:template/vue/categoryList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
</body>

<?php echo '<script'; ?>
 src="js/appCSR.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:template/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
