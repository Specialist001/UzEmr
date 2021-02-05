<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClinicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clinic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-6 col-md-4">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-6 col-md-4">
            <?= $form->field($model, 'user_id')->dropDownList($allUsers, [
                'prompt' => 'Select User',
                'class' => 'form-control select-2',
                'data' => [
                    'text' => 'Text',
                    'image' => 'Image'
                ]
            ]) ?>
        </div>
        <div class="col-6 col-md-4">
            <?= $form->field($model, 'name') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
