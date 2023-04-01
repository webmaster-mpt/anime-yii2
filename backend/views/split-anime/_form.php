<?php

use common\models\Anime;
use common\models\AnimeParts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SplitAnime $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="split-anime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'anime_id')->dropDownList(ArrayHelper::map(Anime::find()->all(),'id','name_m')) ?>

    <?= $form->field($model, 'anime_parts_id')->dropDownList(ArrayHelper::map(AnimeParts::find()->all(),'id','name_anime_p')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success mt-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
