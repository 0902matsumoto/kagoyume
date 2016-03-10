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
        if(!empty($_SESSION["login"])){
            unset($_SESSION["login"]);
            if(!empty($_COOKIE["PHPSESSID"])){
                setcookie("PHPSESSID",'', time() - 3600, '/kagoyume/');
                session_destroy();
                  print 'ログアウトしました。3秒後にトップページに戻ります。'; 
                    ?><SCRIPT LANGUAGE="JavaScript">
                      <!--
                      function autoLink()
                      {
                      location.href="<?= ROOT_URL ?>";
                      }
                      setTimeout("autoLink()",3); 
                      // -->
                      </SCRIPT><?php
            }
        }else{
           if(!empty($_POST["name"])&&!empty($_POST["pass"])){
               $result = login($_POST["name"]);
                    if($_POST["name"]==$result[0]["name"] && $_POST["pass"]==$result[0]["password"]){
                        $_SESSION["login"] = $result[0]["userID"];?>
                        <SCRIPT LANGUAGE="JavaScript">
                        <!--
                        function autoLink()
                        {
                        location.href="<?= $_SESSION["location"] ?>";
                        }
                        setTimeout("autoLink()",0); 
                        // -->
                        </SCRIPT>
                   <?php }
                    print 'ユーザー名、パスワードが正しくありません';
           }?>
           <form action ="<?= LOGIN ?>" method="POST">
               <h1>ログイン画面</h1>
                   ユーザー名：<input type="text" name="name" value=""><br><br>
                   パスワード：<input type="text" name="pass" value=""><br><br>
                   <input type="submit" name="LOGIN" value="ログイン"><br><br>
           </form>
                  <form action ="<?= REGISTRATION ?>" method="POST">
                      <input type="submit" name="REGISTRATION" value="新規会登録"><br><br>
                  </form>
         <?php         
        }
        ?>
    </body>
</html>
