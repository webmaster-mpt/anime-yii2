<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Anime $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Аниме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
