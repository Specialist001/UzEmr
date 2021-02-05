<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Clinic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">User Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class=" row align-items-center">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'user_id')->dropDownList($model->getUsersList(), ['prompt'=>'Select...']) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>



</div>
