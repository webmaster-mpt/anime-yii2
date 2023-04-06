<?php

use common\models\dictionary\AgeRaiting;
use common\models\dictionary\Status;
use common\models\dictionary\StatusPosts;
use common\models\dictionary\TypeAnime;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Anime $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerJsFile('../js/form_ap.js');
?>

<div class="anime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(TypeAnime::$type, ['prompt' => '']) ?>

    <?= $form->field($model, 'key_anime_m')->input('text',['id' => 'key']) ?>

    <?= $form->field($model, 'name_m')->input('text') ?>

    <?= $form->field($model, 'poster')->input('text') ?>

    <?= $form->field($model, 'count_parts')->input('number') ?>

    <?= $form->field($model, 'status')->dropDownList(Status::$status, ['prompt' => '']) ?>

    <?= $form->field($model, 'age_raiting')->dropDownList(AgeRaiting::$age_raiting, ['prompt' => '']) ?>

    <?= $form->field($model, 'year_released')->input('text') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_posts')->dropDownList(StatusPosts::$status_posts, ['prompt' => '']) ?>


    <div class="form-group mt-2">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
