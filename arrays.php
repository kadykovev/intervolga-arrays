<?php

$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

$subjects = array_reduce($data, function ($acc, $student_assessment) {
    [, $subject,] = $student_assessment;
    if (!in_array($subject, $acc)) {
        $acc[] =  $subject;
    }
    return $acc;
}, []);

sort($subjects);

$studentScores = array_reduce($data, function ($acc, $student_assessment) {
    [$name, $subject, $assesment] = $student_assessment;
    $acc[$name][$subject] = $acc[$name][$subject] ?? 0;
    $acc[$name][$subject] += $assesment;
    return $acc;
}, []);

ksort($studentScores);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Массивы</title>
</head>
<body>
    <table class="table-bordered">
        <tr>
            <td></td>
            <!-- Сделал так для верстальщиков, не знаю правильно ли? -->
            <?php foreach ($subjects as $subject) : ?>
            <td><?php echo $subject; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($studentScores as $student => $scores) : ?>
        <tr>
            <td><?php echo $student; ?></td>
            <?php foreach ($subjects as $subject) : ?>
            <td><?php echo $scores[$subject] ?? ''; ?></td>
            <?php endforeach; ?>
        </tr>    
        <?php endforeach; ?>
    </table>
</body>
</html>