<?php
function getItemCount($tasks, $item) {
        $count = 0;
        foreach ($tasks as $value){
            if ($value['category'] == $item){
                $count = $count + 1;
            }
        }
        return $count;
    }
?>

<div class="content">
            <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                        <?php foreach ($projects as $value): ?>
                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link"><?=$value?> </a>
                            <span class="main-navigation__list-item-count"><?=getItemCount($tasks, $value)?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks === 1): ?>checked<?php endif; ?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    <?php foreach ($tasks as $value): ?>
                        <?php if (($show_complete_tasks == 1) or ($value['completed'] == 'false')): ?>
                            <tr class="tasks__item task <?php if (date_count($value['date_of_completion']) <= 24 && $value['completed'] == 'false' && $value['date_of_completion'] != null): ?> task--important <?php endif;?><?php if ($value['completed'] == 'true'): ?> task--completed<?php endif ?>"> 
                                <td class="task__select">
                                    <label class="checkbox task__checkbox">
                                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1" <?php if ($value['completed'] == 'true'): ?>checked<?php endif ?>>
                                        <span class="checkbox__text"><?=$value['task'] ?></span>
                                    </label>
                                    
                                </td>
                                
                                <td class="task__date"><?=$value['date_of_completion'] ?></td>
                                <td class="task__controls"><?=$value['category'] ?></td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
                </table>
            </main>
        </div>
    </div>
</div>