<?php 
require_once '../util/defineUtil.php';
require_once '../util/scriptUtil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>トップ</title>
    </head>
    <body>
        <?php
        SESSION_START();
        $_SESSION["location"] = ROOT_URL; 
        ?>
        <Div Align="right"><?= login_cart(); ?></Div>
        <?php
        $query = !empty($_GET["query"]) ? $_GET["query"] : ""; //検索のワードを$queryに格納
                                //array_key_exists (調べるキー又は添字, 対象配列) キーがあるならば、true。
                       //$_GET["sort"]に値が格納されていて、かつ、検索結果のソート方法が格納された配列に$_GET["sort"]があるならばtrue。
        $sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score"; 
                     //ctype_digit() 関数の引数に指定された文字列に数字だけならばtrue。
                                   //$_GET["category_id"]が未定義によりエラー
        $category_id = !empty($_GET["category_id"]) && ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;
        ?>
        <h1>ショッピングデモサイト - 商品を検索する</h1>
        <form action="./search.php">
        表示順序:
        <select name="sort">
        <?php foreach ($sortOrder as $key => $value) { ?>
        <option value="<?php echo $key; ?>" <?php if($sort == $key) echo "selected=\"selected\""; ?>><?php echo $value;?></option>
        <?php } ?>
        </select>
        キーワード検索：
        <select name="category_id">
        <?php foreach ($categories as $id => $name) { ?>
        <option value="<?php echo $id; ?>" <?php if($category_id == $id) echo "selected=\"selected\""; ?>><?php echo $name;?></option>
        <?php } ?>
        </select>
        <input type="text" name="query" value="<?php echo $query; ?>"/>
        <input type="submit" value="検索"/>
        </form>
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
    </body>
</html>

<?php
//setcookie('code', '', time() - 3600, '/kagoyume/');
var_dump($_COOKIE["code"]);
?>