<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $data common\models\Doctor */

\backend\assets\SelectAsset::register($this);

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
$search = false;
$doctorSearch = Yii::$app->request->get();
if (isset($doctorSearch['DoctorSearch']) && is_array($doctorSearch['DoctorSearch'])) {
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
                    <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
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
<!--                <div class="float-right">-->
<!--                    <button class="btn btn-secondary rounded-pill" type="button" >-->
<!--                        Open-->
<!--                    </button>-->
<!--                </div>-->
            </div>
            <div class="iq-card-body collapse <?php echo $search ? 'show' : '' ?>" id="doctorSearch">
                <?php  echo $this->render('_search', [
                        'model' => $searchModel,
                        'allUsers' => ArrayHelper::map(User::findAll(['status' => \common\models\User::STATUS_ACTIVE]), 'id', 'username'),
                        'specialities' => ArrayHelper::map(\common\models\Specialty::find()->all(), 'id', 'name'),
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
                    'filterModel' => null,
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        [
                            'attribute' => 'user_id',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if ($data->user) {
                                    return Html::a($data->user->username, ['users/view', 'id'=>$data->user_id]);
                                }
                                return null;
                            },
                        ],
//                        'speciality_id',
                        [
                            'attribute' => 'speciality_id',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if ($data->hasSpeciality()) {
                                    return $data->specialityName;
//                                    return Html::a($data->speciality->name, ['user/view', 'id'=>$data->user_id]);
                                }
                                return null;
                            },
                        ],
                        'first_name',
                        [
                            'attribute' => 'first_name',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if ($data->user) {
                                    return Html::a($data->first_name, ['view', 'id'=>$data->id]);
                                }
                                return null;
                            },
                        ],
                        'middle_name',
                        'last_name',
                        'status',
                        //'created_at',
                        //'updated_at',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update} {delete}',
                            'buttons' => [

                            ]
                        ],
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