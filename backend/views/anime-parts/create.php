<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AnimeParts $model */

$this->title = 'Добавить часть';
$this->params['breadcrumbs'][] = ['label' => 'Часть', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-parts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
