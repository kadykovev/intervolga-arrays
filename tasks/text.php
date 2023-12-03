<?php

$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

$wordNumber = 29;

//Ищем слова не содержащиеся внутри тегов
preg_match_all('/\b\w+\b(?![^<]*>)/u', $text, $matches, PREG_OFFSET_CAPTURE);

//Смещение слова в тексте в байтах
$wordOffset = $matches[0][$wordNumber][1];

//Обрезаем текст и добавляем '...' в конце
$croppedString = trim(substr($text, 0, $wordOffset)) . '...';

//Находим парные теги содержащиеся в обрезанной строке, исключаем одиночные теги,
//которые могут встретиться внутри тега <body>
$regexp = '/(?<=<)(?!br)(?!wbr)(?!hr)(?!col)(?!track)(?!source)(?!embed)(?!area)(?!img)\/?[A-z]+/';
preg_match_all($regexp, $croppedString, $tags);

$missingTags = [];

//Парные теги вложены друг в друга и не пересекаются,
//мы можем обойти массив добавляя в переменную $missingTags открывающие теги и вытягивать закрывающие.
//Те теги, котрые остались в переменной являются недостающими.
foreach ($tags[0] as $tag) {
    if ($tag[0] === '/') {
        array_pop($missingTags);
    } else {
        array_push($missingTags, $tag);
    }
}

$endOfString = '';

foreach ($missingTags as $tag) {
    $endOfString = "</{$tag}>{$endOfString}";
}

//результиррующая строка с сохранением форматирования
$resultText = $croppedString . $endOfString;
?>

<h3 class="text-center p-2">Результат обрезания текста новости</h3>

<?php echo $resultText; ?>