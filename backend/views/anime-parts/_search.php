<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\AnimePartsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anime-parts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'key_anime_p') ?>

    <?= $form->field($model, 'name_anime_p') ?>

    <?= $form->field($model, 'path_n') ?>

    <?= $form->field($model, 'number_p') ?>

    <?php // echo $form->field($model, 'source_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
