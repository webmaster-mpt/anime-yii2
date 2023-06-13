<?php

use common\models\Anime;
use common\models\dictionary\StatusPosts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\AnimeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Аниме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model)
        {
            if($model->status_posts == '0') {
                return ['style' => 'background-color: #e15c5c; font-weight: 500;'];
            } else{
                return ['style' => 'background-color: #4d9857;font-weight: 500'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'key_anime_m:ntext',
            'name_m',
            'count_parts',
            [
                'attribute'=>'status_posts',
                'value' => function (Anime $model) {
                    return $model->status_posts == 0 ? 'hide' : 'show';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Anime $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
