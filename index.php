<?php require_once('funct/funct.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Задачи от Intervolga</title>
</head>
<body>
    <main  class="container-md">
        <div class="row">
            <div class="col">
                <h1 class="text-center p-4 mb-4 bg-light text-dark">Задачи от INTERVOLGA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/?content=arrays">Задача №1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?content=sql">Задача №2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?content=crud">Задача №3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?content=text">Задача №4</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <?php getContent(); ?>
            </div>
        </div>
    </main>
</body>
</html>