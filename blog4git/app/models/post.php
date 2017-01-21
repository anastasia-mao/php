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

function postSave(array $post) // сохранение поста
{
    //очистка и валидация данных

    return storageSaveItem(ENTITY_POST, $post);
}