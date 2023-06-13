<link rel="stylesheet" href="../css/style-parts.css">
<!--    <img src="../css/skelet.svg" alt="skelet">-->
    <div class="s-container">
        <div class="main">
            <?php foreach ($rows as $key => $row) { ?>
                <title><?= $row->name_m ?></title>
                <div class="posters">
                    <img src="https://drive.google.com/uc?export=view&id=<?= $row->poster ?>" alt="">
                </div>
                <div class="info">
                    <div class="name-save">
                        <h1 id="name"><?= $row->name_m ?></h1>
                        <!--                    <a href="save?user_id=-->
                        <?php //= Yii::$app->user->id ?><!--&anime_id=-->
                        <?php //= $row->id ?><!--" id="">Сохранить</a>-->
                        <img src="../save_border.svg" alt="save" id="unsave" class="save" data-anime="<?= $row->id ?>"
                             data-user="<?= Yii::$app->user->id ?>">
                    </div>
                    <div class="group-info">
                        <p>Статус: <a href="category/?filters=upload" id="status_a"
                                      target="_blank"><?= $row->status ?></a></p>
                        <p>Возрастной рейтинг: <?= 'PG-' . $row->age_raiting ?></p>
                        <p>Год выпуска: <?= $row->year_released ?></p>
                        <div class="group-btn">
                            <a href="player?code=<?= $row->key_anime_m ?>&id=<?= $row->id ?>" class="btn showBtn">Смотреть
                                фильм</a>
                            <a href="/site/category" class="backBtn">Назад</a>
                        </div>
                        <p id="description"><?= $row->description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
</div>
<script>
    let unSave = document.querySelector('#unsave')
    animeId = unSave.attributes.getNamedItem('data-anime').value
    userId = unSave.attributes.getNamedItem('data-user').value;

    let status = 'unSave';

    let data = {
        anime_id: animeId,
        user_id: userId
    }

    unSave.addEventListener('click', function (e) {
        if (status == 'save' && e.type == 'click') {
            ajaxUnSave();
            status = 'unSave';
        } else {
            ajaxSave();
            status = 'save';
        }
    });

    function ajaxSave() {
        $.ajax({
            url: `save?user_id=${data.user_id}&anime_id=${data.anime_id}`,
            data: data,
            type: 'post',
            success: function (res) {
                toast('Сохранено','dark');
                unSave.attributes.src.value = '../save.svg';
                unSave.attributes.id.value = 'save';
            },
        });
    }

    function toast(text, theme){
        new Toast({
            title: false,
            text: text,
            theme: theme,
            autohide: true,
            interval: 50000
        });
    }

    function ajaxUnSave() {
        $.ajax({
            url: `un-save?user_id=${data.user_id}&anime_id=${data.anime_id}`,
            data: data,
            type: 'post',
            success: function (res) {
                toast('Удалено','dark');
                unSave.attributes.id.value = 'unsave';
                unSave.attributes.src.value = '../save_border.svg';
            },
        });
    }

    $(document).ready(function () {
        document.title = $('#name')[0].textContent;
        $.ajax({
            url: `save-check?user_id=${data.user_id}&anime_id=${data.anime_id}`,
            data: data,
            type: 'post',
            success: function (res) {
                if (res == 'Аниме добавлено!') {
                    unSave.attributes.id.value = 'save';
                    unSave.attributes.src.value = '../save.svg';
                    status = 'save';
                }
            },
        })
    });

</script>
