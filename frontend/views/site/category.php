<?php

use yii\bootstrap5\BootstrapAsset;

/** @var yii\web\View $this */

$this->title = 'Home';
$this->registerCssFile('../css/style-m.css');
?>
<div class="container">
    <div class="m-grid">
        <?php foreach ($model as $m) { ?>
            <div class="m-card hidden">
                <p><?= $m->name_m ?></p>
                <img src="https://drive.google.com/uc?export=view&id=<?= $m->poster ?>">
                <a href="anime-parts?id=<?= $m->id ?>" class="btn btn-danger">Смотреть</a>
            </div>
        <?php } ?>
    </div>
</div>
