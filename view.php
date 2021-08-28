<?php
require_once('data.php');
header('Content-Type: text/html; charset=utf-8');

if(isset($_GET['id'])) {
    $newsId = $_GET['id'];
}

$newsCont = $db->query("SELECT `title`, `content` FROM news WHERE id = " . $newsId);

?>

<title><?=$newsCont[0]['title'];?></title>
<link rel="stylesheet" href="css/styles.css">
<body>
    <main>
        <article>
            <div class="news-full-text">
                <h1><?=$newsCont[0]['title'];?></h1>
                <hr>
                <div class="news-content"><?=$newsCont[0]['content'];?></div>
            </div>
            <hr>
            <div class="back-to-newslist"><a href="news.php?page=1">Все новости >></a></div>
        </article>
    </main>
</body>