<?php include __DIR__ . '/../header.php'; ?>

<h2>Комментарии</h2>

<?php foreach ($article->getComments() as $comment): ?>
    <div id="comment<?= $comment->getId() ?>" class="comment">
        <p><strong><?= htmlspecialchars($comment->getAuthor()->getNickname()) ?></strong> (<?= $comment->getCreatedAt() ?>)</p>
        <p><?= nl2br(htmlspecialchars($comment->getText())) ?></p>
        <p><a href="/comments/<?= $comment->getId() ?>/edit">Редактировать</a></p>
    </div>
<?php endforeach; ?>

<h3>Добавить комментарий</h3>
<form action="/articles/<?= $article->getId() ?>/comments" method="post">
    <p>
        <textarea name="text" rows="5" cols="50" required></textarea>
    </p>
    <p>
        <button type="submit">Отправить</button>
    </p>
</form>

<?php include __DIR__ . '/../footer.php'; ?>