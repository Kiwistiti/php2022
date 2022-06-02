<!doctype html>
<html lang="fr">

<head>
    <title>PHP</title>
    <?php include("header.php") ?>
</head>

<body>
    <?php include("menu.php") ?>
    <main>
        <div class="container">
            <h1>superglobal</h1>
            <a class="btn btn-success" href="t03-supercouleur.php?couleur=rouge" role="button">Super Couleur</a>
            <pre><?php var_dump($GLOBALS); ?></pre>
            <h2>Les variables serveurs</h2>
            <p><?= $_SERVER['PHP_SELF']?></p> <!-- /t03-superglobal.php -->
            <p><?= $_SERVER['SERVER_NAME']?></p> <!-- 172.16.91.129 -->
            <p><?= $_SERVER['HTTP_HOST']?></p> <!-- 172.16.91.129 -->
            <p><?= $_SERVER['HTTP_USER_AGENT']?></p> <!-- Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36 Edg/101.0.1210.32' (length=133) -->
            <p><?= $_SERVER['SCRIPT_NAME']?></p> <!-- /t03-superglobal.php -->
            <p><?= $_SERVER['SERVER_ADDR']?></p> <!-- 172.16.91.129 -->
            <p><?= $_SERVER['REMOTE_ADDR']?></p> <!-- 172.16.91.1 -->
            <p><?= $_SERVER['HTTP_REFERER']?></p> <!-- http://172.16.91.129/t01-variables.php -->
        </div>
    </main>

    <?php include("footer.php") ?>
</body>

</html>