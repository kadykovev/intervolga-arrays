# Задачи от ИНТЕРВОЛГА

## Требования
PHP >= 7 </br>
PHP:PDO </br>
SQLite </br>

## Как пользоваться
Клонировать репозиторий: </br>
`git clone git@github.com:kadykovev/tasks-from-intervolga.git`</br>
Перейти в каталог с репозиторием: </br>
`cd tasks-from-intervolga`</br>
Запустить встроеный сервер в терминале: </br>
`php -S localhost:8000` </br>
Открыть в браузере ссылку </br>
`http://localhost:8000`

## Список задач

### 1. Массивы

Имеется массив с баллами школьников по разным предметам.</br>
<pre>$data = [
&emsp;['Иванов', 'Математика', 5],
&emsp;['Иванов', 'Математика', 4],
&emsp;['Иванов', 'Математика', 5],
&emsp;['Петров', 'Математика', 5],
&emsp;['Сидоров', 'Физика', 4],
&emsp;['Иванов', 'Физика', 4],
&emsp;['Петров', 'ОБЖ', 4],
];</pre>

Необходимо вывести его в виде таблицы table-tr-td (баллы суммируются, школьники и предметы отсортированы):

<table>
  <tr>
    <td></td><td>Математика</td><td>ОБЖ</td><td>Физика</td>
  </tr>
  <tr>
    <td>Иванов</td><td>14</td><td></td><td>4</td>
  </tr>
  <tr>
    <td>Петров</td><td>5</td><td>4</td><td></td>
  </tr>
  <tr>
    <td>Сидоров</td><td></td><td></td><td>4</td>
  </tr>
</table>

Критерии оценки: минимум циклов и дополнительных переменных.

### 2. SQL
Есть база данных состоящая из таблиц:
группы каталога
товары
наличие товаров на складах
склады

<pre>SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `availabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `availabilities` (`id`, `amount`, `product_id`, `stock_id`) VALUES
(1, 3, 1, 1),
(2, 2, 1, 5),
(5, 5, 2, 1),
(6, 2, 5, 5),
(9, 1, 6, 1),
(10, 1, 6, 5);

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Электроника'),
(2, 'Бытовая техника'),
(5, 'Аксессуары'),
(6, 'Расходные материалы'),
(9, 'Мебель'),
(10, 'Товары для дачи');

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `products` (`id`, `title`, `category_id`) VALUES
(1, 'Телевизор LG', 1),
(2, 'Смартфон Samsung', 1),
(5, 'Микроволновая печь Redmond', 2),
(6, 'Кухонная вытяжка Elica', 2),
(9, 'Кабель питания HDMI', 6),
(10, 'Сетевой фильтр', 6);

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `stocks` (`id`, `title`) VALUES
(1, 'Главный склад'),
(2, 'Склад на Невской'),
(5, 'Склад на Бакинской');</pre>


По некоторой причине нарушена их связность:
есть пустые группы (без товаров)
есть товары без наличия
есть склады без товаров`

Необходимо написать код для устранения (удаления) этих нарушений.

Критерии оценки: минимум SQL-запросов.

### 3. CRUD
Создайте страницу со списком комментариев и формой добавления нового.
После добавления нового комментария страница перезагружается, добавленный комментарий отображается в конце списка.

Критерии оценки: защита от инъекций.



### 4. Текст
Дан текст новости

<pre>$text = &lt;&lt;&lt;TXT &lt;p class=&quot;big&quot;&gt; Год основания:&lt;b&gt;1589 г.&lt;/b&gt; Волгоград отмечает день города в &lt;b&gt;2-е воскресенье сентября&lt;/b&gt;. &lt;br&gt;В &lt;b&gt;2023 году&lt;/b&gt; эта дата - &lt;b&gt;10 сентября&lt;/b&gt;. &lt;/p&gt; &lt;p class=&quot;float&quot;&gt; &lt;img src=&quot;https://www.calend.ru/img/content_events/i0/961.jpg&quot; alt=&quot;Волгоград&quot; width=&quot;300&quot; height=&quot;200&quot; itemprop=&quot;image&quot;&gt; &lt;span class=&quot;caption gray&quot;&gt;Скульптура &laquo;Родина-мать зовет!&raquo; входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)&lt;/span&gt; &lt;/p&gt; &lt;p&gt; &lt;i&gt;&lt;b&gt;Великая Отечественная война в истории города&lt;/b&gt;&lt;/i&gt;&lt;/p&gt;&lt;p&gt;&lt;i&gt;Важнейшей операцией Советской Армии в Великой Отечественной войне стала &lt;a href=&quot;https://www.calend.ru/holidays/0/0/1869/&quot;&gt;Сталинградская битва&lt;/a&gt; (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.&lt;/i&gt; &lt;/p&gt; TXT;</pre>

Необходимо обрезать его до 29 слов с добавлением многоточия.
Форматирование необходимо сохранить