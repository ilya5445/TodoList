<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODOLIST</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">TodoList</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="/">Главная</a>
            <a class="p-2 text-dark" href="/create">Создать задачу</a>
        </nav>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']): ?>
            <a class="btn btn-primary" href="/logout">Выход</a>
        <?php else: ?>
            <a class="btn btn-outline-primary" href="/auth">Войти</a>
        <?php endif ?>
    </div>