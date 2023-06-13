<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Anime $model */

$this->title = $model->name_m;
$this->params['breadcrumbs'][] = ['label' => 'Аниме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anime-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить часть', '/anime-parts/create', ['class' => 'btn btn-light']) ?>
        <?= Html::a('Добавить', 'create', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'key_anime_m:ntext',
            'poster',
            'name_m',
            'count_parts',
            'status',
            'age_raiting',
            'year_released',
            'description',
        ],
    ]) ?>
</div>
