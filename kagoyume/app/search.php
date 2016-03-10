<?php 
require_once '../util/defineUtil.php';
require_once '../util/scriptUtil.php';
require_once '../util/dbaccessUtil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>検索結果</title>
    </head>
    <body>
        <?php
        $query = !empty($_GET["query"]) ? $_GET["query"] : ""; //検索のワードを$queryに格納
                                //array_key_exists (調べるキー又は添字, 対象配列) キーがあるならば、true。
                       //$_GET["sort"]に値が格納されていて、かつ、検索結果のソート方法が格納された配列に$_GET["sort"]があるならばtrue。
        $sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score"; 
                     //ctype_digit() 関数の引数に指定された文字列に数字だけならばtrue。
                                   //$_GET["category_id"]が未定義によりエラー
        $category_id = ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;

        $request = array($query, $sort, $category_id, $appid);
        
        $hits = shopping_api($request);
      
        foreach ($hits as $hit) { ?>
               <a href="<?php echo ITEM; ?>?code=<?= $hit->Code ?>"><img src="<?php echo $hit->Image->Medium; ?>" /></a>
               <a href="<?php echo ITEM; ?>?code=<?= $hit->Code ?>"><?php echo $hit->Name; ?></a>
               金額：<a href="<?php echo ITEM; ?>?code=<?= $hit->Code ?>"><?php echo $hit->Price; ?></a><br>
               
         <?php
        }
        ?>
    </body>
</html>