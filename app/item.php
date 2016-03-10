<?php 
require_once '../util/defineUtil.php';
require_once '../util/scriptUtil.php';
require_once '../util/dbaccessUtil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $code = !empty($_GET["code"]) ? $_GET["code"] : ""; 
        $syousai = array($code, $appid);
        $hit = itemLookup_medium($syousai);
        
        $hit_2 = itemLookup_small($syousai);
        
        $hyouka = $hit->Review->Rate;
        $setumei = $hit->Description;
        $gazou = $hit->Image->Medium;
        $kakaku = $hit_2->Price;
        $name = $hit_2->Name;
        ?>
        <img src="<?= $gazou ?>">
        <?php
        $item = array($name, $setumei, $hyouka, $kakaku);
        
        foreach ($item as $value){
            print "<br>".$value."<br>";
        }
        ?>
        <form action = "<?= ADD ?>" method = "POST">
            <input type = "hidden" name ="code" value = "<?= $_GET["code"] ?>">
            <input type = "submit" name = "add" value = "カートに追加">
        </form>
    </body>
</html>
