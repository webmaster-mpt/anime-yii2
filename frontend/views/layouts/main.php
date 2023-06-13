<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="../css/toast.min.css" rel="stylesheet">
    <script src="../js/toast.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>
<!--<header>-->
<!--    NavBar::begin([-->
<!--        'brandLabel' => Yii::$app->name,-->
<!--        'brandUrl' => Yii::$app->homeUrl,-->
<!--        'options' => [-->
<!--            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',-->
<!--        ],-->
<!--    ]);-->
<!--    $menuItems = [-->
<!--        ['label' => 'Главная', 'url' => ['/site/index']],-->
<!--    ];-->
<!--    if (Yii::$app->user->isGuest) {-->
<!--        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];-->
<!--    }-->
<!--    echo Nav::widget([-->
<!--        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],-->
<!--        'items' => $menuItems,-->
<!--    ]);-->
<!--    if (Yii::$app->user->isGuest) {-->
<!--        echo Html::tag('div',Html::a('Вход',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);-->
<!--    } else {-->
<!--        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])-->
<!--            . Html::submitButton(-->
<!--                'Logout (' . Yii::$app->user->identity->username . ')',-->
<!--                ['class' => 'btn btn-link logout text-decoration-none']-->
<!--            )-->
<!--            . Html::endForm();-->
<!--    }-->
<!--    NavBar::end();-->
<!--</header>-->

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
