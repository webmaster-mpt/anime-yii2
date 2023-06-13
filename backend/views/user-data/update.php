<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserData $model */

$this->title = 'Изменить: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Данные пользователя', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
