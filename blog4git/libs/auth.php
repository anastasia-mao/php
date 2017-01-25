<?php

//проверяет может ли пользователь войти и выполняет вход
function authorize($username, $password)
{
    $user = userGetBy('username', $username);

    if (count($user) != 1) {//проверяем единственный ли у нас пользователь
        return false;
    }

    $user = $user[0];

    if (!password_verify($password, $user['password'])){//проверка соответствия введенного пароля, с сохраненным хешем парол
        return false;
    }

    $_SESSION['user'] = [ // записать пользователя в сессию
        'id' => $user['id'],
        'username' => $user['username'],
    ];

}

//проверяет авторизован ли пользователь
function isAuthorized()
{
    return isset($_SESSION['user']);
}

//выходит из акаунта
function logout()
{
    unset($_SESSION['user']);
}