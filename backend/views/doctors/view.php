<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-lg-4">
        <div class="iq-card">
            <div class="iq-card-body pl-0 pr-0 pt-0">
                <div class="doctor-details-block">
                    <div class="doc-profile-bg bg-primary" style="height:150px;">
                    </div>
                    <div class="doctor-profile text-center">
                        <img src="../medical/images/user/11.png" alt="profile-img" class="avatar-130 img-fluid">
                    </div>
                    <div class="text-center mt-3 pl-3 pr-3">
                        <h4><b><?php echo $model->first_name . ' '.$model->last_name.', '.$model->middle_name?></b></h4>
                        <p>Doctor</p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repudiandae eveniet harum.</p>
                    </div>
                    <hr>
                    <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                        <li class="text-center">
                            <h3 class="counter">4500</h3>
                            <span>Operations</span>
                        </li>
                        <li class="text-center">
                            <h3 class="counter">100</h3>
                            <span>Hospital</span>
                        </li>
                        <li class="text-center">
                            <h3 class="counter">10000</h3>
                            <span>Patients</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Personal Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                    <div class="row">
                        <div class="col-4">First Name:</div>
                        <div class="col-8"><?php echo $model->first_name ?></div>
                        <div class="col-4">Last Name:</div>
                        <div class="col-8"><?php echo $model->last_name ?></div>
                        <div class="col-4">Middle Name:</div>
                        <div class="col-8"><?php echo $model->middle_name ?></div>
                        <div class="col-4">Age:</div>
                        <div class="col-8">27</div>
                        <div class="col-4">Position:</div>
                        <div class="col-8">Senior doctor</div>
                        <div class="col-4">Email:</div>
                        <div class="col-8"><a href="/cdn-cgi/l/email-protection#afcdc6c1c6e5cadbdc9d9befcbcac2c081ccc0c2"> <span class="__cf_email__" data-cfemail="a4c6cdcacdeec1d0d79690e4c0c1c9cb8ac7cbc9">[email&nbsp;protected]</span> </a></div>
                        <div class="col-4">Phone:</div>
                        <div class="col-8"><a href="tel:001-2351-25612">001 2351 256 12</a></div>
                        <div class="col-4">Location:</div>
                        <div class="col-8">USA</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-md-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Speciality</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="speciality-list m-0 p-0">
                            <li class="d-flex mb-4 align-items-center">
                                <div class="user-img img-fluid"><a href="#" class="iq-bg-primary"><i class="ri-award-fill"></i></a></div>
                                <div class="media-support-info ml-3">
                                    <h6>Professional</h6>
                                    <p class="mb-0"><?php echo $model->speciality->name ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
