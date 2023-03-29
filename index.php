<?php
require_once('helpers.php');
$show_complete_tasks = rand(0, 1);
$projects = ["Входящие", "Учёба", "Работа", "Домашние дела", "Авто"];
$tasks = [
    [
        'task' => 'Собеседование в IT компании',
        'date_of_completion' => '22.09.2022',
        'category' => 'Работа', 
        'completed' => 'false'
    ],
    [
        'task' => 'Выполнить тестовое задание',
        'date_of_completion' => '23.09.2022',
        'category' => 'Работа', 
        'completed' => 'false'
    ],
    [
        'task' => 'Сделать задание первого раздела',
        'date_of_completion' => '09.10.2022',
        'category' => 'Учёба', 
        'completed' => 'true'
    ],
    [
        'task' => 'Встреча с другом',
        'date_of_completion' => '24.10.2022',
        'category' => 'Входящие', 
        'completed' => 'false'
    ],
    [
        'task' => 'Купить корм для кота',
        'date_of_completion' => 'null',
        'category' => 'Домашние дела', 
        'completed' => 'false'
    ],
    [
        'task' => 'Заказать пиццу',
        'date_of_completion' => 'null',
        'category' => 'Домашние дела', 
        'completed' => 'false'
    ]
    ];


$page_content = include_template('main.php',['tasks' => $tasks, 'projects' => $projects, 'show_complete_tasks' => $show_complete_tasks ]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Дела в порядке',
]);
print($layout_content);  
?>


