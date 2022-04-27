<?php require_once(__DIR__ .'/layouts/header.php'); ?>

<div class="container">

    <?php if(isset($pageData['alert'])): ?>
        <div class="alert alert-<?=$pageData['alert']['type']?>" role="alert">
            <?=$pageData['alert']['msg']?>
        </div>
    <?php endif ?>

    <div class="col-md-10">

        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Имя</label>
                <div class="col-sm-6">
                    <input class="form-control" name="name" type="text" value="<?=$pageData['work']['name']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input class="form-control" name="email" type="email" value="<?=$pageData['work']['email']?>" required>
                </div>
            </div>
            <div class="mb-3 form-check">
                <div class="col-sm-3">
                    <input class="form-check-input" name="status" type="checkbox" id="status" <?=$pageData['work']['status'] ? 'checked' : ''?>>
                    <label class="form-check-label" for="status">Выполнено</label>
                </div>
            </div>
            <div class="form-group">
                <label for="text" class="col-sm-3 control-label">Описание задачи</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="text" type="text" rows="5" required><?=$pageData['work']['text']?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Изменить">
                </div>
            </div>
        </form>

    </div>
</div>

<?php require_once(__DIR__ .'/layouts/footer.php'); ?>