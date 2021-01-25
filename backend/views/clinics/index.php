<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clinics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clinic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>