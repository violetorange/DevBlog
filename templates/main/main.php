<?php include __DIR__ . '/../header.php'; ?>

<? if (empty($articles)): ?>
    <p>Статей пока нет. Ознакомьтесь с основными возможностями в блоке <a href="/about" class="main-color">about</a></p><br>
<? else: ?>
    <?php foreach ($articles as $article): ?>                                
        <div class="col-md-12 blog-post">
            <div class="post-title">
            <a href="/articles/<?= $article->getId() ?>"><h1><?= $article->getName() ?></h1></a>
            </div>  
            <div class="post-info">
                <span><?= date("M d, Y", strtotime($article->getDate())); ?> / by <a><?= $article->getAuthor()->getNickname() ?></a></span>
            </div>  
            <p><?= $article->getText() ?></p>                          			
            <a href="/articles/<?= $article->getId() ?>" class="button button-style button-anim fa fa-long-arrow-right"><span>Читать</span></a>
            <hr>
        </div>
    <?php endforeach; ?>
<? endif; ?>


<div class="col-md-12 text-center">
    <a href="javascript:void(0)" id="load-more-post" class="load-more-button">Load</a>
    <div id="post-end-message"></div>
</div>

        </div>

    </div>

</div>
<?php include __DIR__ . '/../footer.php'; ?>