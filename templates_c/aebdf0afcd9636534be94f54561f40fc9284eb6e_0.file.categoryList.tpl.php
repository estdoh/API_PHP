<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:43:11
  from 'D:\wamp64\www\prototipos\API\template\vue\categoryList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4bafe579a7_32625295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aebdf0afcd9636534be94f54561f40fc9284eb6e' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\vue\\categoryList.tpl',
      1 => 1637760848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ae4bafe579a7_32625295 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div id="appCSR">
        <h1>{{ titulo }}</h1>
        <h2>{{ subtitulo }}</h2>

        <table class="table table-sm table-hover" id="listadoClientes">
            <caption>Presupuestador</caption>
            <thead>
                <tr>
                    <th>Nombre Categoria <a href="OrderBy/name/"> <i class="fas fa-filter fa-xs"></i></a></th>                
                    <th>Descripcion<a href="OrderBy/description/"><i class="fas fa-filter fa-xs"></i></a></th>                
                    <th></th> 
                    <th></th>                 
                </tr>
            </thead>
                                    
            <tbody id="listadoTD">

                <tr v-for="(category, index) in categories" >
                    <td> {{ category.name }}</td>                            
                    <td> {{ category.description }}</td>                           
                    <td> <a v-on:click='delete(index)' class='w-100 btn btn-sm btn-danger' data-id='buttonSupr'><i class='fa fa-trash fa-sm' aria-hidden='true'></i> </a> </td> 
                    <td> <a href='viewCategoryCRS/{{ category.id_category }}' class='w-100 btn btn-sm btn-primary edicionproducto' data-id='buttonEdit'><i class='fa fa-pencil fa-sm' aria-hidden='true'></i> </button> </td>                         
                </tr>
            </tbody>
        </table>
        
    </div>
<?php }
}
