<?php

const ENTITY_USER = 'user';
/*
function userGetById($id)
{
    return storageGetItemById(ENTITY_USER, $id);
}
*/

function userSave(array $user, array &$errors = null)
{
    // очистка и валидация данных
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
    if ($errors) {
        return $user;
    }

    $status = storageSaveItem(ENTITY_USER, $user);

    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
    }

    return $user;
}

function userGetBy($attribute, $criteria)
{
    return storageGetItemBy(ENTITY_USER, $attribute, $criteria);
}