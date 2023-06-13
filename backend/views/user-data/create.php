<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserData $model */

$this->title = 'Create User Data';
$this->params['breadcrumbs'][] = ['label' => 'User Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
