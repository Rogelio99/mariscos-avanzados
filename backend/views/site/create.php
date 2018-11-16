<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<a href="<?= Url::toRoute("site/carta")?>">Carta</a>
<h1>Añadir Alimento</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "nom_a")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descripcion")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "precio")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "imagen")->input("file") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "cantidad")->input("number") ?>   
</div>

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

