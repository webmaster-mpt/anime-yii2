<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AnimeParts $model */

$this->title = 'Изменить: ' . $model->name_anime_p;
$this->params['breadcrumbs'][] = ['label' => 'Аниме части', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_anime_p, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="anime-parts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
