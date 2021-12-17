<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:40:26
  from 'D:\wamp64\www\prototipos\API\template\body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4b0aac9004_65465478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d797225e5d19ddc19dc2161f2e96963d7faaba5' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\body.tpl',
      1 => 1637721384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/header.tpl' => 1,
    'file:template/head.tpl' => 1,
    'file:template/categorybuttons.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_61ae4b0aac9004_65465478 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="inicio">
        <h2 class="resaltar"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h2>
        <h4 class="resaltar"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</h4>
        <h3>Carga de datos para <b>administrador</b></h3>
    </div>    

    <div class="container"> 
        <?php if ($_smarty_tpl->tpl_vars['rol']->value == "SUPER-ADMIN" || $_smarty_tpl->tpl_vars['rol']->value == "ADMIN") {?>     
            <div class="col-1 m-1">
                <button class=" w-100 btn btn-sm btn-success" id="addProduct" ><i class="fas fa-plus fa-xs" ></i></button>
            </div>
        <?php }?>
         
        <div class="col-md-12 col-sm-12 p-4 border rounded-3 bg-light agregarcliente"> 
            <form id="form-products" action="InsertProduct" method="POST" autocomplete="on" enctype="multipart/form-data">                
                <div class="form-group  mb-3">
                    <div class="form-floating col">
                        <input name="input_name" id="input_name" type="text" class="form-control" placeholder="Nombre" required>
                        <label for="name"><p>Producto</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_description" id="input_description" type="text" class="form-control" placeholder="Descripcion">
                        <label for="description"><p>Descripcion</p></label>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['rol']->value == "SUPER-ADMIN" || $_smarty_tpl->tpl_vars['rol']->value == "ADMIN") {?>
                        <div class="form-floating col">
                            <input type="file" name="input_image" id="input_image" class="form-control" multiple>
                            <label for="image"><p>Imagen</p></label>
                        </div>
                    <?php }?>
                    <select name="input_category" class="form-floating col" required>                    
                        <option selected disabled>Seleccionar categoria</option>  
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>                             
                                <div class="col-2 m-1">
                                    <option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id_category;?>
'><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</option>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
                        <option value='addNew' placeholder="agregarnuevo"></option>                        
                    </select>                    
                
                    <div class="form-floating col">
                        <input name="input_price_a" id="input_price_a" type="number" class="form-control" placeholder="PrecioB">
                        <label for="price_a"><p>Precio A</p></label>
                    </div>
                    <div class="form-floating col">
                        <input name="input_price_b" id="input_price_b" type="number" class="form-control" placeholder="PrecioB">
                        <label for="price_b"><p>Precio B</p></label>
                    </div>
                </div>

                <div class="form-floating mb-2">
                    <div class="form-floating col ">
                        <button type="submit" class="w-100 btn btn-lg btn-success" >AGREGAR </button>
                    </div>
                </div>

            </form>           
        </div>
               
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:template/categorybuttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
        <div class="col-md-12 mt-sm-5 table-responsive">                   
            <table class="table table-sm table-hover" id="listadoClientes">
                <caption>Presupuestador</caption>
                <thead>
                    <tr>
                        <th>imagen</th>
                        <th>Producto <a href="OrderBy/name"> <i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Categoria<a href="OrderBy/category"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Descripcion<a href="OrderBy/description"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>precio A<a href="OrderBy/price_a"><i class="fas fa-filter fa-xs"></i></a></th>
                        <th>Precio B<a href="OrderBy/price_b"><i class="fas fa-filter fa-xs"></i></a></th>          
                        <th></th>
                        <th></th> 
                        <?php if ($_smarty_tpl->tpl_vars['email']->value != '') {?> 
                            <th></th>
                        <?php }?>                
                    </tr>
                </thead>
                                
                <tbody id="listadoTD">
        
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "SUPER-ADMIN" || $_smarty_tpl->tpl_vars['rol']->value == "ADMIN") {?> 
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                        <tr>
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->img) {?>
                                <td><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>
" class="img-fluid" alt="Responsive image" width="100px"></td>
                            <?php } else { ?>
                                <td><img src="images/noimagen.png" class="img-fluid" alt="Responsive image" width="100px"></td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</td>
                            <td><a href="Search/<?php echo $_smarty_tpl->tpl_vars['product']->value->name_category;?>
" ><?php echo $_smarty_tpl->tpl_vars['product']->value->name_category;?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</td>                            
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->price_a;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->price_b;?>
</td>
                            <td><a href='commentsProducts/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' class='w-100 btn btn-sm btn-info' data-id='buttonComentario'><i class='fa fa-eye fa-sm' aria-hidden='true'></i> </a> </td>
                            <td><a href='delProducts/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                            <td><a href='viewProduct/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>                
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>                    
                        <tr>
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->img) {?>
                                <td><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>
" class="img-fluid" alt="Responsive image" width="100px"></td>
                            <?php } else { ?>
                                <td><img src="images/noimagen.png" class="img-fluid" alt="Responsive image" width="100px"></td>
                            <?php }?>
                            <td>  <?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</td>
                            <td> <a href="Search/<?php echo $_smarty_tpl->tpl_vars['product']->value->name_category;?>
" ><?php echo $_smarty_tpl->tpl_vars['product']->value->name_category;?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</td>                            
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->price_a;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['product']->value->price_b;?>
</td>
                            <td> <a href='commentsProducts/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' class='w-100 btn btn-sm btn-info' data-id='buttonComentario'><i class='fa fa-eye fa-sm' aria-hidden='true'></i> </a> </td>
                            <td><a href='viewProduct/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                          
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                </tbody>
            </table>          

        </div>
    </div>
</body>

<?php echo '<script'; ?>
 src="js/desplegarAdd.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:template/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
