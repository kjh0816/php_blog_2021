<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../webInit.php';

$articleController = new APP__ArticleController();

$sql = DB__secSql();
$sql->add("SELECT *");
$sql->add("FROM article AS A");
$sql->add("ORDER BY A.id DESC");
$articles = DB__getRows($sql);
?>
<?php
$pageTitle = "게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<div>
  <a href="write.php">글 작성</a>
</div>
<hr>

<div>
  <?php foreach ( $articles as $article ) { ?>
    <?php
    $detailUri = "detail.php?id=${article['id']}";
    ?>
    <a href="<?=$detailUri?>">번호 : <?=$article['id']?></a><br>
    작성 : <?=$article['regDate']?><br>
    수정 : <?=$article['updateDate']?><br>
    <a href="<?=$detailUri?>">제목 : <?=$article['title']?></a><br>
    <hr>
  <?php } ?>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>
