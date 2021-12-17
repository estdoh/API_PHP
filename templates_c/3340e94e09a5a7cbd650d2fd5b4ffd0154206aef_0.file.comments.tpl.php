<?php
/* Smarty version 3.1.39, created on 2021-12-06 17:48:43
  from 'D:\wamp64\www\prototipos\API\template\comments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61ae4cfb124479_10243715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3340e94e09a5a7cbd650d2fd5b4ffd0154206aef' => 
    array (
      0 => 'D:\\wamp64\\www\\prototipos\\API\\template\\comments.tpl',
      1 => 1637718013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ae4cfb124479_10243715 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <section v-if="rol>=1" id="template-vue-agregar" >
        <h1 class="text-center" >{{titulo}}</h1>
        <div v-if="errors.length" class="col-12 bg-danger text-center text-light p-3">
            <p v-for="error in errors">*{{ error }}</p>
        </div>
        <form  method="POST" @submit="agregarComentario">
            <div class="form-floating col-12">
                <label for="puntaje"> <span>Mi puntaje:</span> </label>
                <select v-model="puntaje" id="puntaje" class="form-control" name="puntaje">
                    <option value="1">1</option>
                    <option value="2">2 </option>
                    <option value="3">3</option>
                    <option value="4">4 </option>
                    <option value="5">5 </option>
                </select>
                <textarea v-model="comentario" id="comentario" class="form-control" name="comentario" cols="20"
                        rows="5" placeholder="Escribanos su comentario"></textarea>
                
                <div class="form-floating col">
                    <button type="submit" class="w-100 btn btn-lg btn-success">COMENTAR</button>
                </div>
            </div>
        </form>
    </section>

    <section v-if="rol>=1" id="template-vue-parametro" >
        <h2 class="text-center" >{{titulo}}</h2>
        <form  method="POST" @submit="filtrarComentarios">
            <div class="container">
                <div class="col-2 m-2">
                    <label for="puntajeFiltro"> <span>Filtrar por Puntaje</span> </label>
                    <select v-model="puntajeFiltro" id="puntajeFiltro" class="form-control" name="puntajeFiltro">
                        <option value="1">1</option>
                        <option value="2">2 </option>
                        <option value="3">3</option>
                        <option value="4">4 </option>
                        <option value="5">5 </option>
                    </select>
                </div>

                <div class="col-2 m-2">
                    <label for="orden"> <span>Ordenar por:</span> </label>
                    <select v-model="orden" id="orden" class="form-control" name="orden">
                        <option value="id_comment">ID</option>
                        <option value="date">Fecha </option>
                        <option value="rating">Puntaje</option>
                    </select>
                </div>

                <div class="col-2 m-2">
                    <label for="filter"> <span>Refrescar</span> </label>
                    <button class=" w-100 btn btn-sm btn-success" id="filter" ><i class="fas fa-redo fa-xs" ></i></button>
                </div>
                
            </div>
        </form>
    </section>


    <section id="template-vue-obtener">
        <h1 class="text-center">{{titulo}}</h1>
        <div class="container">

            <div class="col-md-12 mt-sm-5 table-responsive">                   
                <table class="table table-sm table-hover" id="listadoClientes">
                    <caption>Comentarios</caption>
                    <thead>
                        <tr>
                            <th>Puntaje</th>
                            <th>Comentario</th>   
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th v-if="rol==2">Eliminar</th>             
                        </tr>
                    </thead>
                                    
                    <tbody id="listadoTD" >
                        <tr v-for="comentario in comentarios">
                            <td>  {{ comentario.rating }}</td>
                            <td>  {{ comentario.comment }}</td>
                            <td>  {{ comentario.email }}</td>
                            <td>  {{ comentario.date }}</td>
                            <td v-if="rol==2"> <a class='w-100 btn btn-sm btn-danger' data-id='buttonSupr' v-on:click="eliminar_comentario(comentario.id_comment)"><i class='fa fa-trash fa-sm' aria-hidden='true'  ></i> </a> </td>
                        </tr>
                    </tbody>
                </table>          

            </div>
        </div>
    </section>

<?php echo '<script'; ?>
 src="js/appCommentsCSR.js"><?php echo '</script'; ?>
><?php }
}
