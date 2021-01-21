<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<div class="wrapper">
    <?php echo $this->render('left.php') ?>
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = ['label' => 'Company', 'url' => ['/company/index']];
//        $menuItems[] = ['label' => 'Module', 'url' => ['/module/index']];
////        $menuItems[] = ['label' => 'User Cards', 'url' => ['/user-card/index']];
////        $menuItems[] = ['label' => 'User Devices', 'url' => ['/user-device/index']];
////        $menuItems[] = ['label' => 'Users', 'url' => ['/users/index']];
//        $menuItems[] = ['label' => 'Users',
//            'url' => ['#'],
//            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
//            'items' => [
//                ['label' => 'Users', 'url' => ['/users/index']],
//                ['label' => 'User Cards', 'url' => ['/user-card/index']],
//                ['label' => 'User Devices', 'url' => ['/user-device/index']],
//            ],
//        ];
//        $menuItems[] = ['label' => 'Api Users', 'url' => ['/api-user/index']];
//        $menuItems[] = ['label' => 'Admins', 'url' => ['/admins/index']];
//        $menuItems[] = ['label' => 'Settings', 'url' => ['/sdk-setting/index']];
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
//    ?>
    <div id="content-page" class="content-page">
        <?php echo $this->render('top.php') ?>
        <div class="container-fluid">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
    <footer class="bg-white iq-footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
