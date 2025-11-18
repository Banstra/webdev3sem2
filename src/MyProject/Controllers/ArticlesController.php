<?php



namespace MyProject\Controllers;



use MyProject\Services\Db;

use MyProject\View\View;



class ArticlesController

{

    /** @var View */

    private $view;



    /** @var Db */

    private $db;



    public function __construct()

    {

        $this->view = new View(__DIR__ . '/../templates');

        $this->db = new Db();
    }



    public function view(int $articleId)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            \MyProject\Models\Articles\Article::class
        );

        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article = $result[0];

        $authorResult = $this->db->query(
            'SELECT nickname FROM `users` WHERE id = :id;',
            [':id' => $article->getAuthorId()]
        );

        $authorNickname = $authorResult ? $authorResult[0]->nickname : 'Неизвестный автор';

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'authorNickname' => $authorNickname
        ]);
    }
}
