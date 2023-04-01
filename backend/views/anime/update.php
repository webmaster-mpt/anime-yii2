<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Anime $model */

$this->title = 'Изменить: ' . $model->name_m;
$this->params['breadcrumbs'][] = ['label' => 'Аниме', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_m, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="anime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
