<?php

function getContent()
{
    $request = $_GET['content'];

    switch ($request) {
        case 'sql':
            $task = "sql.php";
            break;
        case 'crud':
            $task = "crud.php";
            break;
        case 'text':
            $task = "text.php";
            break;
        default:
            $task = "arrays.php";
    }

    require_once("tasks/{$task}");
}

//Функция для замены опасных тегов
function replaceDangerousTags($text)
{
    $regexp = '/<(\/?script|\/?form|\/?iframe|\/?input)[^>]*>/i';
    $replacement = '&lt;$1&gt;';
    return preg_replace($regexp, $replacement, $text);
}
