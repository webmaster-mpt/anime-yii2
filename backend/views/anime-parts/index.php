<?php

use common\models\AnimeParts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\AnimePartsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Аниме части/серии';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .upload_btn, .upload_btn:hover{
        color: #fff;
    }
</style>
<div class="anime-parts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model)
        {
            if($model->status_upload == 'upload') {
                return ['style' => 'background-color: #e15c5c; font-weight: 500;'];
            } else{
                return ['style' => 'background-color: #4d9857;font-weight: 500'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'key_anime_p:ntext',
            'name_anime_p:ntext',
            'path_n:ntext',
            'number_p',
            [
                'attribute'=>'status_upload',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->status_upload), Url::to(['/site/upload', 'id' => $model->id, 'path' => $model->source]), ['class' => 'upload_btn']);
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AnimeParts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
