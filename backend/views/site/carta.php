<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<a href="<?= Url::toRoute("site/create") ?>">Crear un nuevo alimento</a>
<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("site/carta"),
    "enableClientValidation" => true,
]);
?>

<div class="form-group">
    <?= $f->field($form, "q")->input("search") ?>
</div>

<?= Html::submitButton("Buscar", ["class" => "btn btn-primary"]) ?>

<?php $f->end() ?>

<h3><?= $search ?></h3>

<h3>Lista de alimentos</h3>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Imagen</th>       
        <th>Cantidad en stock</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_alimento ?></td>
        <td><?= $row->nombre ?></td>
        <td><?= $row->descripcion ?></td>
        <td><?= $row->precio ?></td>
        <td><img src='<?= $row->imagen ?>'></td>
        <td><?= $row->cantidad ?></td>
        <td><a href="<?= Url::toRoute(["site/update", "id_alimento" => $row->id_alimento]) ?>">Editar</a></td>
        <td>
        <a href="#" data-toggle="modal" data-target="#id_alimento_<?= $row->id_alimento ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_alimento_<?= $row->id_alimento ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar alimento</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Esta seguro de eliminar el alimento?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
                                    <input type="hidden" name="id_alimento" value="<?= $row->id_alumno ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
            </td>
        <td></td>
        
    </tr>
    <?php endforeach ?>
</table>


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

