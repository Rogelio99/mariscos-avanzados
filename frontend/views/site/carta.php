<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

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

<h3>Lista de alumnos</h3>

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Imagen</th>       
        <th>Cantidad</th>
        <th>Añadir al carrito</th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_alimento ?></td>
        <td><?= $row->nom_a ?></td>
        <td><?= $row->descripcion ?></td>
        <td><?= $row->precio ?></td>
        <td><img src='<?= $row->imagen ?>' ></td>
        <td><input type="number" name="cantidad" required="" id="input_cantidad" min="1" max=""></td>
        <td>
        
            </td>
    </tr>
    <?php endforeach ?>
</table>

