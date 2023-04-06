<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Uploader';
$this->registerCssFile('../css/upload.css');
$this->registerJsFile('../js/upload.js');
?>
<style>
    .upload_inp{
        width: 100%;
    }
</style>
<div class="site-index">
    <div class="m-wrapper">
        <div class="row">
            <div class="left">
                <header>Загрузить файлы</header>
                <?= \yii\helpers\Html::input('text', 'path_v', $source , ['class' => 'upload_inp']) ?>
                <form action="http://api-anime/test.php" class="form-up upload">
                    <input class="path" type="text" name="path" value="<?= $source ?>" hidden>
                    <input class="file-input" type="file" name="file" hidden>
                    <p>Поле для загрузки</p>
                </form>
                <section class="progress-area"></section>
                <section class="uploaded-area"></section>
            </div>
            <div class="right">
                <header>Список существующих файлов</header>
                <div class="files">
                </div>
                    <?= Html::a('Изменить статус на загружено', ['change-status-parts', 'id' => $_GET['id'], 'status' => 'uploaded'],['class' => 'btn btn-danger']) ?>
<!--                    <a href="changeStatusParts?id=&status=" class="btn btn-danger">Изменить статус на загружено</a>-->
            </div>
        </div>
    </div>
</div>
