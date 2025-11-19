<?php include __DIR__ . '/../header.php'; ?>

<h1>Редактирование статьи</h1>


<form action="/articles/<?= $article->getId() ?>/edit" method="POST">

    <p>
        <label for="name">Название статьи:</label><br>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($article->getName()) ?>" required>
    </p>
    <p>
        <label for="text">Текст статьи:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required><?= htmlspecialchars($article->getText()) ?></textarea>
    </p>
    <p>
        <button type="submit">Сохранить</button>
    </p>
</form>

<?php include __DIR__ . '/../footer.php'; ?>