<?php include __DIR__ . '/../header.php'; ?>

<h1><?= htmlspecialchars($article->getName()) ?></h1>
<p><?= nl2br(htmlspecialchars($article->getText())) ?></p>
<p>Автор: <?= htmlspecialchars($article->getAuthor()->getNickname()) ?></p>

<?php include __DIR__ . '/../footer.php'; ?>