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
        SESSION_START();
        if(!empty($_COOKIE["code"])){
            $separator = explode(' ', $_COOKIE["code"]);
            $total = 0;
                foreach($separator as $value){
                    $syousai = array($value, $appid);
                    $hit = itemLookup_medium($syousai);
                    $hit_2 = itemLookup_small($syousai);
                        $gazou = $hit->Image->Medium;
                        $kakaku = $hit_2->Price;
                        $name = $hit_2->Name;
                        $url = $hit_2->Url;
                            ?>
                            <img src="<?= $gazou ?>">
                            <br>
                            <a href="<?= $url; ?>"><?= $name; ?></a>
                            <br>
                            <?php
                            print "<br>".$kakaku."<br>"; 
                            $total += $kakaku;
                               ?>
                               <form action ="<?= CART ?>" method ="POST">
                                  <input type = "hidden" name = "cart" value ="<?= $value ?>"> 
                                  <input type ="submit" name ="no" value ="カートから削除">
                               </form>   
                               <br>
                               <?php      
                }
                print "<br>".'合計金額:'.$total."<br>"; 
        }else{
            print 'カートに商品はありません';
            ?>
            <br><br>
            <a href="<?= $_SESSION["location"] ?>">戻る</a>
            <?php
        }
        ?>
    </body>
</html>
