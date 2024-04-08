<?php include __DIR__ . '/../header.php'; ?>

    <h1>Создание новой статьи</h1>
    <?php if(!empty($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>



    <form action="/articles/add" method="post">
        <div class="form-group">
            <label for="name">Название статьи</label>
            <input name="name" type="text" class="form-control" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50">
        </div>
        <div class="form-group">
            <label for="text">Текст статьи</label>
            <textarea name="text" class="form-control" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Опубликовать</button>
    </form>
<?php include __DIR__ . '/../footer.php'; ?>