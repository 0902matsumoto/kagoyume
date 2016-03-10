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
        print 'カートに追加しました';
        
        $code = !empty($_POST["code"]) ? $_POST["code"] : "";
        var_dump($_POST["code"]);
        if(empty($_COOKIE["code"])){
            setcookie('code', $code, time() + 3600, '/kagoyume/');
        }else{
            setcookie('code', $_COOKIE["code"].' '.$code, time() + 3600, '/kagoyume/');
        }
        return_top()
        ?>
    </body>
</html>
