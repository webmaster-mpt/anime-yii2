<?php

use common\models\Anime;
use common\models\dictionary\StatusUpload;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AnimeParts $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile('../js/form_ap.js');
?>

<div class="anime-parts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key_anime_p')->input('text',['id' => 'key']) ?>

    <?= $form->field($model, 'name_anime_p')->input('text') ?>

    <?= $form->field($model, 'poster')->input('text') ?>

    <?= $form->field($model, 'path_n')->input('text') ?>

    <?= $form->field($model, 'number_p')->input('text') ?>

    <?= $form->field($model, 'status_upload')->dropDownList(StatusUpload::$status, ['prompt' => '']) ?>

    <div class="form-group mt-2">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
