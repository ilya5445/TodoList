<?php require_once(__DIR__ .'/layouts/header.php'); ?>

<div class="container">

    <?php if(isset($pageData['alert'])): ?>
        <div class="alert alert-<?=$pageData['alert']['type']?>" role="alert">
            <?=$pageData['alert']['msg']?>
        </div>
    <?php endif ?>

    <div class="col-md-10">

        <form accept-charset="UTF-8" class="form-horizontal" method="POST">
            <div class="form-group ">
                <label for="name" class="col-sm-3 control-label">Имя</label>
                <div class="col-sm-6">
                    <input class="form-control" name="name" type="text" required>
                </div>
            </div>
            <div class="form-group ">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input class="form-control" name="email" type="email" required>
                </div>
            </div>
            <div class="form-group ">
                <label for="text" class="col-sm-3 control-label">Описание задачи</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="text" type="text" rows="5" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Создать">
                </div>
            </div>
        </form>

    </div>
</div>

<?php require_once(__DIR__ .'/layouts/footer.php'); ?>