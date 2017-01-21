<?php

const STORAGE_DB_DIR = ROOT_DIR . DIRECTORY_SEPARATOR /*разделитель дерикторий*/ . 'db'; //путь к деррикторию где будет лежать все файлы блога
const STORAGE_FILENAME_PATTERN = '%d.json';

function storageCreateFilename($entity, $id)
{
    // printf - позволяет выводить строчку в определенном формате, %d- целое число
    // sprintf - возвращает строчку
    // имя файла это полный путь к файлу
    $fileName = storageGetDir($entity) . DIRECTORY_SEPARATOR . sprintf(STORAGE_FILENAME_PATTERN, $id); // получаем имя файла
    touch($fileName); // создает файл
    return $fileName;
    //return storageGetDir($entity) . DIRECTORY_SEPARATOR . sprintf(STORAGE_FILENAME_PATTERN, $id);
}

function storageGetDir ($entity) // получает путь к дериктории
{
    return STORAGE_DB_DIR . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], '_', $entity)/* защищает от передачи наверных символов*/;
}

function storageGetIdFromFilename($filename)
{
    // basename - возвращает имя файла без пути
    $filename = basename($filename);
    // sscanf -
    sscanf($filename, STORAGE_FILENAME_PATTERN, $id);
    return (int) $id;
}

function storageGetNextId($entity)
{
    $dir = storageGetDir($entity);
    // scandir - функция которая возвращает все файлы записаные в директории в виде массива
    // array_map- позволяет пройтись по всем элементам массива применяет заданную функцию для всех элементов массива
    // array_filter - для убирания элементов по заданным аргементам, если без передачи аргумента то удаляет все пустые. нулевые, false

    if (!is_readable($dir)){
        return 0;
    }

    $ids = array_map('storageGetIdFromFilename', scandir($dir));
    $ids = array_filter($ids);
    // $id = max($ids); - было, не работает, выкидывает ошибку что $ids пустой при создании первого поста
    // return $id ? $id + 1 : 1;
    return $ids ? max($ids) + 1 : 1;
}

function storageGetItemBy($entity, $attribute, $criteria)
{

}

function storageGetItemById($entity, $id) // функция для получения и чтения файлов
{
    $filename = storageCreateFilename($entity, $id); // функция которая присвоит имя
    if (is_readable($filename)){ // проверка существует ли файл и доступен ли он для чтения
        // json_decode -разбирает json в виде ассоциативного массива или объекта
        // file_get_contents - читает весь файл в строку
        return json_decode(file_get_contents($filename), true /*если true - ассоциативный массив, если false - объект*/);
    }

    return null; // если запись по id не найдена
}

function storageGetAll($entity)
{

}

function storageSaveItem($entity, array  &$item) // добавляет запись в блоге или обновляем
{
    $dir = storageGetDir($entity);
    if (!file_exists($dir) && is_writable(dirname($dir))){
        mkdir($dir, 0755/*режим дериктории, права на доступ*/, true);
    }
    // доп. проверка

    $id = $item['id'] ?? 0; //проверяем есть ли id, если его нет то задаем 0
    $storedItem = storageGetItemById($entity, $id);

    if ($id && !$storedItem) { // защита от сохранения в существующюю записть не существующего содержимого
        return false;
    }

    // $item = array_merge($storedItem, $item); // обновление записи // ЗАЧЕМ ЭТО?! $storedItem при создании нового поста = null,
    // а без этой строки старые посты обновляются!

    if (!$id){ // запись id для новой поста
        $id = storageGetNextId ($entity);
        $item['created'] = time();
    }

    $item ['id'] = (int) $id;
    $item['updated'] = time();

    $filename = storageCreateFilename($entity, $id);

    return file_put_contents($filename, json_encode($item), LOCK_EX);
}
