<?php

/** @var yii\web\View $this */

$this->title = 'Uploader';
$this->registerCssFile('../css/upload.css');
$this->registerJsFile('../js/upload.js');
?>
<div class="site-index">
    <div class="m-wrapper">
        <header>File Uploader</header>
        <form action="http://api-anime/test.php" class="form-up">
            <input type="text" name="path">
            <p class="upload">Click me</p>
            <input class="file-input" type="file" name="file" multiple hidden>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
    </div>
</div>
