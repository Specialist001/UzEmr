<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */

\backend\assets\SelectAsset::register($this);
$clinics = \common\models\Clinic::find()->asArray()->all();
//var_dump(\common\models\Doctor::getActiveClinics($model->id));
?>

<div class="row">
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body p-0">
                <div class="iq-edit-list">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-2 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                Personal Information
                            </a>
                        </li>
                        <li class="col-md-2 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                Change Password
                            </a>
                        </li>
                        <li class="col-md-2 p-0">
                            <a class="nav-link" data-toggle="pill" href="#clinics">
                                Clinics
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                Email and SMS
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                Manage Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="iq-edit-list-data">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Personal Information</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <img class="profile-pic" src="../medical/images/user/11.png" alt="profile-pic">
                                        <div class="p-image">
                                            <i class="ri-pencil-line upload-button"></i>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row align-items-center">
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'speciality_id')->dropDownList(\common\models\Doctor::getSpecialities(), ['prompt'=>'Select...']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt'=>'Select...']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form>
                                <div class="form-group">
                                    <label for="cpass">Current Password:</label>
                                    <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                    <input type="Password" class="form-control" id="cpass" value="">
                                </div>
                                <div class="form-group">
                                    <label for="npass">New Password:</label>
                                    <input type="Password" class="form-control" id="npass" value="">
                                </div>
                                <div class="form-group">
                                    <label for="vpass">Verify Password:</label>
                                    <input type="Password" class="form-control" id="vpass" value="">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="clinics" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Clinics</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
<!--                            --><?php //$form = ActiveForm::begin(['id'=>'clinics']); ?>
<!--                                <div class="form-group">-->
<!--                                    <label for="cpass">Current Password:</label>-->
<!--                                    <a href="javascripe:void();" class="float-right">Forgot Password</a>-->
<!--                                    <input type="Password" class="form-control" id="cpass" value="">-->
<!--                                </div>-->
<!--                            --><?php //echo Html::dropDownList('clinics', null,[],
//                                [
//                                    'class' => 'select2',
//                                    'prompt'=>'Select...',
//                                    'multiple' => 'multiple'
//                                ]) ?>
                            <form id="clinics_form">
                                <input type="hidden" name="_csrf-backend" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                <input type="hidden" name="doctor_id" value="<?php echo $model->id?>">
                                <?php if ($clinics && is_array($clinics)) { ?>
                                    <label for="clinics">Clinics</label>
                                <select name="clinics[]" id="clinics" class="form-control select-2" multiple="multiple">
                                    <?php foreach ($clinics as $clinic) { ?>
                                        <option value="<?php echo $clinic['id'] ?>" <?php echo in_array($clinic['id'], \common\models\Doctor::getActiveClinics($model->id)) ? 'selected' : '' ?>>
                                            <?php echo $clinic['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php } ?>
                                <a class="btn btn-primary mr-2 clinics_submit">Submit</a>
                                <button type="reset" class="btn iq-bg-danger">cancel</button>
                            </form>
<!--                            --><?php //ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Email and SMS</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form>
                                <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="emailnotification"
                                               checked="">
                                        <label class="custom-control-label" for="emailnotification"></label>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="smsnotification"
                                               checked="">
                                        <label class="custom-control-label" for="smsnotification"></label>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Email</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email01">
                                            <label class="custom-control-label" for="email01">You have new
                                                notifications.</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email02">
                                            <label class="custom-control-label" for="email02">You're sent a direct
                                                message</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                            <label class="custom-control-label" for="email03">Someone adds you as a
                                                connection</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email04">
                                            <label class="custom-control-label" for="email04"> Upon new order.</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email05">
                                            <label class="custom-control-label" for="email05"> New membership
                                                approval</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                            <label class="custom-control-label" for="email06"> Member
                                                registration</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Manage Contact</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form>
                                <div class="form-group">
                                    <label for="cno">Contact Number:</label>
                                    <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" value="Binijone@demo.com">
                                </div>
                                <div class="form-group">
                                    <label for="url">Url:</label>
                                    <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

$js = <<<JS
    $('.clinics_submit').on('click', function() {
        let data = $('form#clinics_form').serialize();
        console.log(data);
        $.ajax({
            url: "/admin/doctors/set-clinics",
            data: data,
            type: "post",
            success: function (response) {
                console.log(response);
            }
        });
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);

?>