<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>

<body>

    <?php include __DIR__ . '/../header.php'; ?>

    <?php foreach ($articles as $article): ?>
        <h2><?= htmlspecialchars($article['name']) ?></h2>
        <p><?= htmlspecialchars($article['text']) ?></p>
        <hr>
    <?php endforeach; ?>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>