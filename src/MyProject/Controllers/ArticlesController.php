<?php



namespace MyProject\Controllers;



use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;
use MyProject\Models\Comments\Comment;



class ArticlesController

{

    /** @var View */

    private $view;



    public function __construct()

    {

        $this->view = new View(__DIR__ . '/../templates');
    }



    public function view(int $articleId): void

    {

        $article = Article::getById($articleId);



        if ($article === null) {

            $this->view->renderHtml('errors/404.php', [], 404);

            return;
        }



        $this->view->renderHtml('articles/view.php', [

            'article' => $article

        ]);
    }

    public function add(): void

    {

        $author = User::getById(1);



        $article = new Article();

        $article->setAuthor($author);

        $article->setName('Новое название статьи');

        $article->setText('Новый текст статьи');



        $article->save();



        var_dump($article);
    }

    public function edit(int $articleId): void

    {

        /** @var Article $article */

        $article = Article::getById($articleId);



        if ($article === null) {

            $this->view->renderHtml('errors/404.php', [], 404);

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article->setName($_POST['name'] ?? '');
            $article->setText($_POST['text'] ?? '');
            $article->save();

            header('Location: /articles/' . $articleId);
            exit();
        }


        $this->view->renderHtml('articles/edit.php', [

            'article' => $article

        ]);
    }
    public function addComment(int $articleId): void
    {
        $article = Article::getById($articleId);
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем текущего пользователя (пример, замените на вашу логику)
            $user = User::getById(1);

            $comment = new Comment();
            $comment->setArticle($article);
            $comment->setAuthor($user);
            $comment->setText($_POST['text'] ?? '');
            $comment->save();

            // Редирект с якорем на добавленный комментарий
            header('Location: /articles/' . $articleId . '#comment' . $comment->getId());
            exit();
        }
    }

    public function editComment(int $commentId): void
    {
        /** @var Comment $comment */
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->setText($_POST['text'] ?? '');
            $comment->save();

            header('Location: /articles/' . $comment->getArticleId() . '#comment' . $comment->getId());
            exit();
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}
