<?php require_once('data.php');
header('Content-Type: text/html; charset=utf-8');
?>
<script type="text/javascript">
    function shineLinks(id){
        try{
            var el=document.getElementById(id).getElementsByTagName('a');
            var url=document.location.href;
            for(var i=0;i<el.length; i++){
                if (url==el[i].href){
                    el[i].className += ' active';
                };
            };
        }catch(e){}
    };
</script>

<title>Новости</title>
<body>
    <main>
        <section class="news-panel">
            <h1>Новости</h1>
            <hr>
            <div class="news">
                <?php foreach ($newsList as $news): ?>
                <div class="news-block">
                    <span class="news-date"><?=gmdate("d.m.y", $news['idate']);?></span>
                    <a href="view.php?id=<?=$news['id'];?>" class="news-title"><?=$news['title'];?></a>
                    <p class="news-announce"><?=$news['announce'];?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <section class="pagination">
            <hr>
            <h3>Страницы:</h3>
            <div id="pages">
                <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>
                    <a class="page-number" href="news.php?page=<?=$page;?>"><?=$page;?></a>
                <?php endfor; ?>
                <script type="text/javascript">shineLinks('pages');</script>
            </div>
        </section>
    </main>
</body>

