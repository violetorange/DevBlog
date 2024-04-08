<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class AdminController extends AbstractController
{
    public function view()
    {
        $articles = Article::findLastFive();
        $comments = Comment::findLastFive();
        $this->view->renderHtml('admin/admin.php', ['articles' => $articles, 'comments' => $comments]);
    }

    public function deleteArticle(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $article->delete();
        Comment::deleteArticleComments('article_id', $articleId);
        header('Location: /admin', true, 302);
    }

    public function deleteComment(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException();
        }
        
        $comment->delete();
        header('Location: /admin', true, 302);
    }
}