<?php

/** @var yii\web\View $this */

$this->title = 'Home';
$this->registerCSsFile('../css/style-m.css');
?>
<div class="site-index">
    <?php if(@$_GET['id']) { ?>
        <div class="container">
            <div class="m-grid">
                <?php foreach ($rows as $key => $row){ ?>
                    <div class="m-card">
                        <p><?= $row->anime->name_m ?></p>
                        <img src="https://drive.google.com/uc?export=view&id=<?= $row->anime->poster ?>">
                        <?= \yii\helpers\Html::a('Смотреть', ['site/player', 'code' => $row->anime->key_anime_m, 'id' => $row->id], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
    <div class="container">
        <div class="m-grid">
            <?php foreach ($model as $m){ ?>
                <div class="m-card">
                    <p><?= $m->name_m ?></p>
                    <img src="https://drive.google.com/uc?export=view&id=<?= $m->poster ?>">
                    <a href="?id=<?= $m->id?>" class="btn btn-danger">Смотреть</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
