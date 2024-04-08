<?php include __DIR__ . '/../header.php'; ?>


            <? if (!empty($user) && $user->isAdmin()) { ?>
                <h2>Последние статьи</h2>
                <?php foreach ($articles as $article): ?>
                    <a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a><br>
                    <a class="warning-color" href="/articles/<?= $article->getId() ?>/edit">Редактировать</a><br>
                    <a class="warning-color" href="/articles/<?= $article->getId() ?>/delete">Удалить</a>
                    <hr>
                <?php endforeach; ?>


                <h2>Последние комментарии</h2>
                <? foreach ($comments as $comment) { ?>
                    <div id ="comment<?= $comment->getId() ?>" class="adminComment">
                        <p><b><a href="/articles/<?= $comment->getArticleId() ?>#comment<?= $comment->getId() ?>"><?= $comment->getAuthor()->getNickname() ?></a></b></p>
                        <p><i><?= $comment->getCommentText() ?></i></p>
                        <a class="warning-color" href="/comments/<?= $comment->getId() ?>/edit">Редактировать</a><br>
                        <a class="warning-color" href="/comments/<?= $comment->getId() ?>/delete">Удалить</a>
                    </div>
                    <hr>
                <? } ?>

            <? } else { ?>
                <p>Доступ только для администратора! <a href="/">Вернуться</a></p>
            <? } ?>


<?php include __DIR__ . '/../footer.php'; ?>





