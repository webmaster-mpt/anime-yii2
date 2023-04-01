<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SplitAnime $model */

$this->title = 'Изменить: ' . $model->anime->name_m;
$this->params['breadcrumbs'][] = ['label' => 'Аниме сплит', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->anime->name_m, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="split-anime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
