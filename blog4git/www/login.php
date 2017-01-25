<?php

require_once __DIR__ . '/../init.php';

$data = $_POST['user'] ?? [];

if (isAuthorized()){
    header('location: index.php');
    exit;
}

if ($data) {
    authorize($data['username'], $data['password']);
    if (isAuthorized()){
        header('location: index.php');
        exit;
    }
    else{
        echo 'неправильный логин или пароль';
    }
}
?>

<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>
    <h1>Войти в учетную запись</h1>
    <form method="post">
        <div>
            <label for="user_username">Имя пользователя/логин</label>
            <input name="user[username]" id="user_username" type="text">
        </div>
        <div>
            <label for="user_password">Пароль</label>
            <input name="user[password]" id="user_password" type="text">
        </div>
        <div>
            <input type="submit" value="Войти">
        </div>
    </form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>