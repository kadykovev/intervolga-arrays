<?php

try {
    // Подключение к базе данных SQLite
    $pdo = new PDO('sqlite:db/database.sqlite');

    // Установка режима ошибок PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создание таблицы comments
    $pdo->query(
        "CREATE TABLE IF NOT EXISTS `comments` (
            `id` INTEGER PRIMARY KEY AUTOINCREMENT,
            `name` TEXT NOT NULL,
            `comment` TEXT NOT NULL
        )"
    );

    if (isset($_POST['submit'])) {
        $name = trim($_POST['name']);
        $comment = trim($_POST['comment']);

        if (empty($name) || empty($comment)) {
            throw new \Exception('Заполните все поля!');
        }

        //Подготовленный запрос для защиты от SQL инъекций и заносим данные как есть
        $pdo->prepare("INSERT INTO `comments` (`name`, `comment`) VALUES (?, ?)")->execute([$name, $comment]);

        //Перезагружаем страницу для исключения повторной отправки формы
        header('Location:' . $_SERVER['SERVER_NAME'] . '?content=crud');
    }
} catch (\Exception $e) {
    echo  '<div class="alert alert-danger" role="alert">Ошибка: ' . $e->getMessage() . '</div>';
}

$comments = $pdo->query("SELECT * FROM `comments`")->fetchAll();
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Ваше имя</label>
        <input class="form-control" id="name" type="text" name="name" placeholder="Ваше имя">
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Ваш комментарий</label>
        <textarea class="form-control" name="comment" id="comment" rows="10" placeholder="Ваш комментарий"></textarea>
    </div>
    <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-3">Отправить</button>
    </div>
    
</form>

<?php foreach ($comments as $comment) :?>
    <div  class="border mb-4 ">
        <div class="p-3 mb-2 bg-light text-dark"><?php echo replaceDangerousTags($comment['name']);?></div>
        <div class="p-3 mb-2 bg-body text-dark"><?php echo replaceDangerousTags($comment['comment']);?></div>
    </div>
<?php endforeach;?>