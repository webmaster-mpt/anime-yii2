<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SplitAnime $model */

$this->title = $model->anime->name_m;
$this->params['breadcrumbs'][] = ['label' => 'Аниме сплит', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="split-anime-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Посмотреть JSON', ['site/parts-json', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary']) ?>
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
            [
                'label' => 'аниме',
                'value' => $model->anime->name_m
            ],
            [
                'label' => 'аниме части/серий',
                'value' => $model->animeParts->name_anime_p
            ],
        ],
    ]) ?>

</div>
