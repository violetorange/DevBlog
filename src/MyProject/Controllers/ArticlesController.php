<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Exceptions\Forbidden;

class ArticlesController extends AbstractController
{
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);
        $comments = Comment::findAllByColumn('article_id', $articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'articleId' => $articleId,
            'comments' => $comments,
            'isAdmin' => $this->user == null ? 0 : $this->user->isAdmin(),
        ]);
    }

    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();            
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!$this->user->isAdmin()) {
            throw new Forbidden('Для редактирования статьи нужно обладать правами администратора');
        }
    
        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage()]);
                return;
            }
    
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!$this->user->isAdmin()) {
            throw new Forbidden('Для добавления статьи нужно обладать правами администратора');
        }
    
        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }
    
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
    
        $this->view->renderHtml('articles/add.php');
    }

    public function addComment(int $articleId): void
    {   
        $article = Article::getById($articleId);
        $comments = Comment::findAllByColumn('article_id', $articleId);
        if (!empty($_POST)) {
            try {
                $comment = Comment::createFromArray($_POST, $this->user, $article);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', [
                    'error' => $e->getMessage(), 
                    'article' => $article,
                    'articleId' => $articleId,
                    'comments' => $comments,
                    'isAdmin' => $this->user == null ? 0 : $this->user->isAdmin(),
                ]);
                return;
            }
    
            header('Location: /articles/' . $article->getId() . '#comment' . $comment->getId(), true, 302);
            exit();
        }
    }

    public function editComment(int $commentId)
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException();            
        }
    
        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/commentEdit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }
    
            header('Location: /articles/' . $comment->getArticleId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/commentEdit.php', ['comment' => $comment]);
    }
}