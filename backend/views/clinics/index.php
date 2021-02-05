<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\backend\assets\SelectAsset::register($this);

$this->title = 'Clinics';
$this->params['breadcrumbs'][] = $this->title;
$search = false;
$clinicSearch = Yii::$app->request->get();
if (isset($clinicSearch['ClinicSearch']) && is_array($clinicSearch['ClinicSearch'])) {
    $search = true;
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title"><?php echo  Html::encode($this->title) ?></h4>
                </div>
                <div class="float-right">
                    <?= Html::a('Create Clinic', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between pointer-event" data-toggle="collapse" data-target="#doctorSearch" aria-expanded="<?php echo $search ? 'true' : 'false' ?>" aria-controls="doctorSearch" style="cursor: pointer">
                <div class="iq-header-title" >
                    <h4 class="card-title">Filter</h4>
                </div>
            </div>
            <div class="iq-card-body collapse <?php echo $search ? 'show' : '' ?>" id="doctorSearch">
                <?php  echo $this->render('_search', [
                    'model' => $searchModel,
                    'allUsers' => ArrayHelper::map(User::findAll(['status' => \common\models\User::STATUS_ACTIVE]), 'id', 'username'),
                ]); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Grid options</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => \backend\widgets\CustomPagination::class,
//                        'linkOptions' => ['class' => 'intro']
                    ],
//                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'user_id',
                        'name',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
    $(".select-2").select2(); 
JS;
$this->registerJs($js, View::POS_END);
?>
