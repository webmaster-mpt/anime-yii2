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
            'status_upload',
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
