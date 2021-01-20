<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'role')->dropDownList(\common\models\Admin::roleList(), [
        'prompt' => 'Select Admin Type']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(\common\models\Admin::statusList(), [
        'prompt' => 'Select Status']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
