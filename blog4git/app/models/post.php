<?php


const ENTITY_POST = 'post';

function postGetAll() // получение всех постов в блоге
{
    $posts = storageGetAll(ENTITY_POST); // получение всех записей из хранилища

    // uasort - сортировка массива с использованием пользовательской функцией, возвращает три значение -1, 0, 1
    uasort($posts, function($a, $b){
        return $b['created'] <=> $a['created'];
    });
    return $posts;
}

function postGetById($id)
{
    return storageGetItemById(ENTITY_POST, $id);
}

function postSave(array $post, array &$errors = null) // сохранение поста
{
    //очистка и валидация данных

    if ($errors){
        return $post; //если есть ошибки в форма возвращаем обратно с корректировками от блока выше
    }

    $status = storageSaveItem(ENTITY_POST, $post); //возвращает статус

    if (!$status){
        $errors['db'] = 'Не удадлось сохранить данные в базу';
    }

    return $post;
}