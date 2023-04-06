<?php
namespace common\models\dictionary;

use common\models\Anime;

Class StatusPosts extends Anime {

    public static array $status_posts = [
        '0' => 'hide',
        '1' => 'show',
    ];
}