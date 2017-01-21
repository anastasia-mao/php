<?php
$posts = [
    [
        'id' => 1,
        'title' => 'Запись №1',
        'content' => 'Текст 1',
        'created' => 432535564,
        'updated' => 646343454,
    ],
    [
        'id' => 2,
        'title' => 'Запись №2',
        'content' => 'Текст 2',
        'created' => 432535564,
        'updated' => 646343454,
    ],
    [
        'id' => 3,
        'title' => 'Запись №3',
        'content' => 'Текст 3',
        'created' => 432535564,
        'updated' => 646343454,
    ],
];

const ROOT_DIR = __DIR__;

require_once  ROOT_DIR . '/libs/storage.php';
require_once  ROOT_DIR . '/libs/storage.php';
require_once  ROOT_DIR . '/libs/sanitize.php';
require_once  ROOT_DIR . '/libs/models/user.php';
require_once  ROOT_DIR . '/libs/auth.php';
require_once  ROOT_DIR . '/libs/view.php';
require_once  ROOT_DIR . '/app/models/post.php';