<?php include __DIR__ . '/../header.php'; ?>
        <h1>Вход</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>

        <form action="/users/login" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="<?= $_POST['email'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="password" value="<?= $_POST['password'] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-success">Войти</button>
        </form>
<?php include __DIR__ . '/../footer.php'; ?>