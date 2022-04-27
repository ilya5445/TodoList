<?php require_once(__DIR__ .'/layouts/header.php'); ?>

<style>
    .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
    }
</style>

<div class="container form-signin">

    <?php if(isset($pageData['alert'])): ?>
        <div class="alert alert-<?=$pageData['alert']['type']?>" role="alert">
            <?=$pageData['alert']['msg']?>
        </div>
    <?php endif ?>

    <div class="col-md-12">

        <form class="form-horizontal" action="/login" method="POST">
            <div class="form-group">
                <label for="login" class="col-sm-12 control-label">Логин</label>
                <div class="col-sm-12">
                    <input class="form-control" name="login" type="text" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-12 control-label">Пароль</label>
                <div class="col-sm-12">
                    <input class="form-control" name="password" type="password" required>
                </div>
            </div>

            <div class="form-group">      
                <div class="col-sm-offset-3 col-sm-12">
                    <input class="btn btn-primary form-control" type="submit" value="Авторизоваться">
                </div>
            </div>
        </form>

    </div>
</div>

<?php require_once(__DIR__ .'/layouts/footer.php'); ?>