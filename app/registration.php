<?php 
require_once '../util/defineUtil.php';
require_once '../util/scriptUtil.php';
require_once '../util/dbaccessUtil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規会員登録</title>
    </head>
    <body>
        <?php
        
        ?>
        <h1>新規会員登録</h1>
        <form action = "<?= REGISTRATION_CONFIRM ?>" method = "POST">
            ユーザー名：<input type = "text" name = "name" value = ""><br><br>
            パスワード：<input type = "text" name = "pass" value = ""><br><br>
            メールアドレス：<input type = "text" name = "mail" value = ""><br><br>
            住所：<input type = "text" name = "address" value = ""><br><br>
            <input type = "submit" name = "registration" value = "登録">
        </from>    
    </body>
</html>
