
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Простой блог на PHP</title>
</head>
<body>

<?php if (isAuthorized()):?>
    <h2>Вы вошли как <?= $_SESSION['user']['username'] ?></h2>
    <a href="logout.php"><button>Выход</button></a>
<?php endif; ?>