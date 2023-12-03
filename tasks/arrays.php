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

//Находим предметы
$subjects = array_reduce($data, function ($acc, $student_assessment) {
    [, $subject,] = $student_assessment;
    if (!in_array($subject, $acc)) {
        $acc[] =  $subject;
    }
    return $acc;
}, []);

//Сортируем найденные предметы
sort($subjects);

//формируем массив где ключ - имя школьника, а значение - массив у которого ключ - название предмета,
//а значение - количество баллов
$studentScores = array_reduce($data, function ($acc, $student_assessment) {
    [$name, $subject, $assesment] = $student_assessment;
    $acc[$name][$subject] = $acc[$name][$subject] ?? 0;
    $acc[$name][$subject] += $assesment;
    return $acc;
}, []);

//Сортируем по ключу
ksort($studentScores);
?>
<h3 class="text-center p-2">Результат работы программы</h3>
<table class="table table-bordered">
    <tr>
        <td></td>
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
