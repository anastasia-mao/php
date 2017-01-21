<?php
require_once  __DIR__ . '/../init.php';
?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>
<?php

// isset($_GET['header1']) ? $header = $_GET['header1'] : $header = 'Добавить новую';
// попытка передать сообщение через заголовки после редиректа, проверен и POST, не получилось

$header = 'Добавить новую';
$title = null;
$content = null;
$numbers = '/^\d+$/'; // регулярка - цифра
$post = []; // чтобы работал merge в записи
$editStatus = 'добавлена';

if (isset($_GET['id']) && preg_match($numbers, $_GET['id'])){ // если передан id и он циферный
    $post = postGetById($_GET['id']);
    if ($post) {
        $header = 'Редактировать';
        $title = $post['title'];
        $content = $post['content'];
        $editStatus = 'отредактирована';
    }
}

if (isset($_POST['post'])) {
    $newPost = $_POST['post'];
    $post = array_merge($post, $newPost); // чтобы не плодил файлы при редактировании
    $edit = $editStatus;
    postSave($post);
}

?>

<?php if (!isset($_POST['post'])): ?> <!-- если пост не отправлен -->
    <h1><?= $header ?> запись</h1>
    <form method="post">
        <div>
            <label for="post_title">Заголовок</label>
            <input name="post[title]" type="text" id="post_title" value="<?= $title ?>">
        </div>
        <div>
            <label for="post_content">Содержимое</label>
            <textarea name="post[content]" id="post_content"><?= $content ?></textarea>
        </div>
        <div>
            <input type="submit" value="Отправить">
        </div>
    </form>
<?php elseif (isset($edit)): ?> <!-- если пост отправлен -->
    <!-- На php вывод сообщения с редиректом адекватно не получается, сделала на js -->
    <script>alert('Запись успешно <?php echo($edit); ?>'); document.location.replace("edit.php");</script>
<?php endif; ?>
<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>