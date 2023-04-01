<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SplitAnime $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Аниме сплит', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="split-anime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
