<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DoctorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-6 col-md-3">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-6 col-md-3">
            <?= $form->field($model, 'user_id')->dropDownList($allUsers, [
                'prompt' => 'Select User',
                'class' => 'form-control select-2',
                'data' => [
                    'text' => 'Text',
                    'image' => 'Image'
                ]
            ]) ?>
        </div>
        <div class="col-6 col-md-3">
            <?= $form->field($model, 'speciality_id')->dropDownList($specialities, [
                'prompt' => 'Select Speciality',
                'class' => 'form-control select-2',
                'data' => [
                    'text' => 'Text',
                    'image' => 'Image'
                ]
            ]) ?>
        </div>
        <div class="col-6 col-md-3">
            <?php  echo $form->field($model, 'status') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'first_name') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'middle_name') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'last_name') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'last_name') ?>



    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        <?php echo Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
