<?php

require_once __DIR__ . '/../init.php';

if (isAuthorized()){
    header('location: index.php');
    exit;
}
$data = $_POST['user'] ?? []; // PHP7.0
$errors = [];
$user = [];
/*
$id = $data['username'] ?? $_GET['username'] ?? null;

if ($id) {
    $user = userGetBy('id', $id);

    if (!$user) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit('Запись не найдена!');
    }
}
*/
if ($data) {

    $user = userSave($data, $errors);
    //$errors = [1];
    if (!$errors) {
        // при успехе
        header('location: login.php');
        exit;
    }
    else{
        // при неудаче регистрации
        header('location: registration.php?id=' . $user['username']);
        exit;
    }
}
?>
<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>
<h1>Регистрация</h1>
<form method="post">
    <div>
        <label for="user_username">Пользователь</label>
        <input name="user[username]" id="user_username" type="text" value="<?= $user['username'] ?? '' ?>">
    </div>
    <div>
        <label for="user_password">Пароль</label>
        <input name="user[password]" id="user_password" type="text" value="<?= $user['password'] ?? '' ?>">
    </div>

    <!-- ?php if (isset($user['id'])): ?>
        <input type="hidden" name="user[id]" value="< ?= $user['id'] ?>">
    < ?php endif; ?-->
    <div>
        <input type="submit" value="Зарегистрироваться">
    </div>
</form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>