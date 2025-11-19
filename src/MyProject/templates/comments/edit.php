<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование комментария</h1>

<form action="/comments/<?= $comment->getId() ?>/edit" method="post">
    <p>
        <textarea name="text" rows="5" cols="50" required><?= htmlspecialchars($comment->getText()) ?></textarea>
    </p>
    <p>
        <button type="submit">Сохранить</button>
    </p>
</form>

<?php include __DIR__ . '/../footer.php'; ?>