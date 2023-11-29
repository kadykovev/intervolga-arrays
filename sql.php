<?php

// Параметры подключения к базе данных
$host = 'localhost';
$dbname = 'database_name';
$username = 'username';
$password = 'password';

try {
    // Подключение к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Добавляем index и foreign_key на "category" к "products"
    $pdo->query("ALTER TABLE `products` ADD INDEX `category_fk_idx` (`category_id` ASC) VISIBLE");
    $pdo->query(
        "ALTER TABLE `products`
        ADD CONSTRAINT `category_fk`
        FOREIGN KEY (`category_id`) 
        REFERENCES `categories` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION"
    );

    //Добавляем index и foreign_key на "products" к "availabilities"
    $pdo->query("ALTER TABLE `availabilities` ADD INDEX `product_fk_idx` (`product_id` ASC) VISIBLE");
    $pdo->query(
        "ALTER TABLE `availabilities` 
        ADD CONSTRAINT `product_fk`
        FOREIGN KEY (`product_id`)
        REFERENCES `products` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION"
    );

    //Добавляем index и foreign_key на "stocks" к "availabilities"
    $pdo->query("ALTER TABLE `availabilities` ADD INDEX `stock_fk_idx` (`stock_id` ASC) VISIBLE");
    $pdo->query(
        "ALTER TABLE `availabilities` 
        ADD CONSTRAINT `stock_fk`
        FOREIGN KEY (`stock_id`)
        REFERENCES `stocks` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION"
    );

    $pdo = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
