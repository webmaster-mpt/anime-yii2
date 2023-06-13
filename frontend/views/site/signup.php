<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \frontend\models\SignupForm $model */

use kartik\file\FileInput;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="site-signup">

    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'avatar')->widget(FileInput::classname(), [
            'options' => ['accept' => 'uploads/*'],
            'pluginOptions' => [
                'showUpload' => false,
                'overwriteInitial' => true,
            ],
        ]); ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            <?= Html::a('Войти', 'login', ['class' => 'btn btn-primary float-end', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
