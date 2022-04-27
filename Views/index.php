<?php 

use Utils\Functions;

require_once(__DIR__ .'/layouts/header.php'); 

?>

<div class="container">

    <?php if (!isset($pageData['works']) || empty($pageData['works'])): ?>
        <div class="alert alert-warning" role="alert">
            Задачи не найдены. <a href="/create">Создайте</a> новую задачу.
        </div>
    <?php endif ?>

    <?php if (isset($pageData['works']) && !empty($pageData['works'])): ?>
        <div class="btn-group mb-2">
            <?=Functions::sort_link('По имени', 'name_asc', 'name_desc');?>
            <?=Functions::sort_link('По E-mail', 'email_asc', 'email_desc');?>
            <?=Functions::sort_link('По дате', 'date_asc', 'date_desc');?>
        </div>
    <?php endif ?>

    <?php foreach($pageData['works'] as $work): ?>
        <div class="card mb-4">
            <div class="card-header text-center">
            <?=$work['name']?>

            <?php if ($work['status']): ?>
                <span class="badge bg-success text-light">Выполнено</span>
            <?php endif ?>
            <?php if ($work['is_edit']): ?>
                <span class="badge bg-warning">Отредактировано администратором</span>
            <?php endif ?>

            </div>
            <div class="card-body">
                <h5 class="card-title"><?=$work['email']?></h5>
                <p class="card-text"><?=$work['text']?></p>

                <?php if (isset($pageData['user'])): ?>
                    <a href="/edit/<?=$work['id']?>" class="btn btn-primary">Редактировать</a>
                <?php endif ?>
                
            </div>
            <div class="card-footer text-muted text-center"><?=$work['created_at']?></div>
        </div>
    <? endforeach ?>

    <?php if (isset($pageData['works']) && !empty($pageData['works'])): ?>
        <div class="text-center">
            <?=$pageData['pagination']?>
        </div>
    <?php endif ?>

</div>

<?php require_once(__DIR__ .'/layouts/footer.php'); ?>