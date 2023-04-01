<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Anime $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerJsFile('../js/form_ap.js');
?>

<div class="anime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(\common\models\dictionary\TypeAnime::$type, ['prompt' => '']) ?>

    <?= $form->field($model, 'key_anime_m')->input('text',['id' => 'key']) ?>

    <?= $form->field($model, 'name_m')->input('text') ?>

    <?= $form->field($model, 'poster')->input('text') ?>

    <?= $form->field($model, 'count_parts')->input('number') ?>

    <div class="form-group mt-2">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
