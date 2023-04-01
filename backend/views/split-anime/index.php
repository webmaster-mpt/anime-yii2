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

//            'id',
            [
                'label' => 'аниме',
                'value' => function(SplitAnime $model){
                    return $model->anime->name_m;
                }
            ],
            [
                'label' => 'аниме часть/серий',
                'value' => function(SplitAnime $model){
                    return $model->animeParts->name_anime_p;
                }
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
