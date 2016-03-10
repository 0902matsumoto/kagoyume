<?php
require_once '../util/defineUtil.php';

function shopping_api($request){
    list($query, $sort, $category_id, $appid) = $request;
        $query4url = rawurlencode($query); //rawurlencode()指定した文字列を » RFC 3986 にもとづいてエンコード。
        $sort4url = rawurlencode($sort);
            $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid"
                    . "&query=$query4url&category_id=$category_id&sort=$sort4url";    
            $xml = simplexml_load_file($url); // XMLファイル($url)をPHPで扱えるデータ構造の集合体に変換し、オブジェクト($xml)に代入する。
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                 $hits = $xml->Result->Hit;
                 return $hits;
        }else{
            return null;
        }
}

function itemLookup_medium($syousai){
    list($code, $appid) = $syousai;
            $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup"
                . "?appid=$appid&itemcode=$code&responsegroup=medium";
             $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                 $hits = $xml->Result->Hit;
                 return $hits;
        }else{
            return null;
        }
}

function itemLookup_small($syousai){
    list($code, $appid) = $syousai;
            $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup"
                . "?appid=$appid&itemcode=$code";
             $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                 $hits = $xml->Result->Hit;
                 return $hits;
        }else{
            return null;
        }
}

function login_cart(){
    if(!empty($_SESSION["login"])){
        ?>
         <form action ="<?= LOGIN ?>" method ="POST">
             <input type ="submit" name ="logout" value ="ログアウト">
         </form>    
        <?php
    }else{
        ?>
         <form action ="<?= LOGIN ?>" method ="POST">
             <input type ="submit" name ="login" value ="ログイン">
         </form>    
        <?php
    }
    ?>
    <form action ="<?= CART ?>" method ="POST">
        <br>
        <input type ="submit" name ="cart" value ="カートを見る">
    </form> 
    <?php
}

function return_top(){?>
    <br><br> 
    <a href="<?= ROOT_URL ?>">トップへ戻る</a>
<?php }
