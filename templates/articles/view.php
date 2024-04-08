<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p><b>Автор: <?= $article->getAuthor()->getNickname() ?></b></p>
    <? if ($isAdmin) { ?>
        <a href="/articles/<?= $articleId ?>/edit">Редактировать статью</a>
    <? } ?>
    <hr>
    <h2>Комментарии</h2>
    <hr>
    <? if (!empty($comments)) { ?>
        <? foreach ($comments as $comment) { ?>
            <div id ="comment<?= $comment->getId() ?>" class="comment">
                <p><b><?= $comment->getAuthor()->getNickname() ?></b></p>
                <p><i><?= $comment->getCommentText() ?></i></p>
                <? if (($user !== null && $comment->getAuthor()->getNickname() === $user->getNickname()) || $isAdmin) { ?>
                    <a href="/comments/<?= $comment->getId() ?>/edit">Редактировать комментарий</a>
                <? } ?>
            </div>
            <hr>
        <? } ?>
    <? } ?>
    
    <? if (!empty($user)) { ?>
        <div class="comment">
            <form action="/articles/<?= $articleId ?>/comments" method="post">
                <div class="form-group">
                    <textarea name="comment" class="form-control" id="text" rows="4" cols="80"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Добавить комментарий</button>
            </form>
        </div>
    <? } else { ?>
        <p>Чтобы оставлять комментарии, необходимо <a href="/users/login">войти</a></p>
    <? } ?>
    <?php if(!empty($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>