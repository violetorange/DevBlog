<?php

namespace MyProject\Models\Comments;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Exceptions\InvalidArgumentException;

class Comment extends ActiveRecordEntity
{
    /** @var string */
    protected $authorId;

    /** @var string */
    protected $articleId;

    /** @var string */
    protected $commentText;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getCommentText(): string
    {
        return $this->commentText;
    }

    public function setCommentText($commentText): string
    {
        return $this->commentText = $commentText;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    /**
     * @return int
     */
    public function getArticleId(): int 
    {
        return $this->articleId;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return Article::getById($this->articleId);
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article): void
    {
        $this->articleId = $article->getId();
    }

    public static function createFromArray(array $fields, User $author, Article $article): Comment
    {
        if (empty($fields['comment'])) {
            throw new InvalidArgumentException('Комментарий не должен быть пустым');
        }

        $comment = new Comment();

        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setCommentText($fields['comment']);

        $comment->save();

        return $comment;
    }

    public function updateFromArray(array $fields): Comment
    {
        if (empty($fields['comment'])) {
            throw new InvalidArgumentException('Комментарий не должен быть пустым');
        }

        $this->setCommentText($fields['comment']);

        $this->save();

        return $this;
    }
}