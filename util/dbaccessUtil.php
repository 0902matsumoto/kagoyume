<?php
//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=kagoyume_db;charset=utf8','matsumoto','white0216');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

function login($name){
    //db接続を確立
    $login_db = connect2MySQL();
    
    $login_sql = "select userID, name, password from user_t where name = :name";
    
    //クエリとして用意
    $login_query = $login_db->prepare($login_sql);
    
    $login_query->bindValue(':name',$name);
    
    //SQLを実行
    try{
        $login_query->execute();
    } catch (PDOException $e) {
        $login_query=null;
        return $e->getMessage();
    }
    
    $result = $login_query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

