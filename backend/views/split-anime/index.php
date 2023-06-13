<?php

use common\models\Anime;
use common\models\AnimeParts;
use common\models\SplitAnime;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SplitAnimeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Аниме сплит';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="split-anime-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'аниме',
                'attribute'=>'anime_id',
                'value' => function(SplitAnime $model){
                    return Html::a(Html::encode($model->anime->name_m), Url::to(['/anime/view', 'id' => $model->anime_id]));
                },
                'format' => 'raw',
            ],
            [
                'label' => 'аниме часть/серий',
                'attribute'=>'anime_parts_id',
                'value' => function (SplitAnime $model) {
                    return Html::a(Html::encode($model->animeParts->name_anime_p), Url::to(['/anime-parts/view', 'id' => $model->anime_parts_id]));
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SplitAnime $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
