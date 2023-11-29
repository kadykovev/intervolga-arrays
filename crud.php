<?php

try {
    // Подключение к базе данных SQLite
    $pdo = new PDO('sqlite:db/database.sqlite');

    // Создание таблицы comments
    $pdo->query(
        "CREATE TABLE IF NOT EXISTS `comments` (
            `id` INTEGER PRIMARY KEY AUTOINCREMENT,
            `name` TEXT NOT NULL,
            `comment` TEXT NOT NULL
        )"
    );

    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $pdo->prepare("INSERT INTO `comments` (`name`, `comment`) VALUES (?, ?)")->execute([$name, $comment]);

    $comments = $pdo->query("SELECT * FROM `comments`")->fetchAll();
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}

print_r($_POST);
print_r($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="name" maxlength="50" placeholder="Ваше имя"><br>
        <textarea name="comment" id="" cols="30" rows="10" placeholder="Ваш комментарий" maxlength="500"></textarea><br>
        <input type="submit" value="Отправить">
    </form>

    <?php foreach ($comments as $comment) :?>
        <div>
            <h1><?php echo $comment['name'];?></h1>
            <p><?php echo $comment['comment'];?></p>
        </div>
    <?php endforeach;?>
</body>
</html>
