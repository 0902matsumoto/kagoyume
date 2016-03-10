<?php
const ROOT_URL              = 'http://localhost/kagoyume/app/top.php';     //トップページ
const SEARTH                = 'search.php';                                //検索結果ページ
const ITEM                  = 'item.php';                                  //商品詳細ページ
const ADD                   = 'add.php';                                   //カート追加ページ
const LOGIN                 = 'login.php';                                 //ログイン管理ページ
const REGISTRATION          = 'registration.php';                         //新規会員登録ページ
const REGISTRATION_CONFIRM  = 'registration_confirm.php';                 //会員登録確認ページ
const REGISTRATION_COMPLETE = 'registration_complete.php';                //会員登録結果ページ
const CART                  = 'cart.php';                                 //カート閲覧ページ
const BUY_CONFIRM           = 'buy_confirm.php';                          //購入確認ページ
const BUY_COMPLETE          = 'buy_complete.php';                         //購入結果ページ
const MY_DATA               = 'my_data.php';                              //ユーザー情報閲覧ページ
const MY_DELETE_RESULT      = 'my_delete_result.php';                     //削除結果ページ
const MY_UPDATE             = 'my_update.php';                            //ユーザー情報更新ページ
const MY_UPDATE_RESULT      = 'my_update_result.php';                     //ユーザー情報更新結果ページ
const MY_DELETE             = 'my_delete.php';                            //ユーザー削除確認ページ

$appid = "dj0zaiZpPU1xeHpZOVRpdG1vRSZzPWNvbnN1bWVyc2VjcmV0Jng9YmU-";//取得したアプリケーションIDを設定

$categories = array(
                    "1" => "すべてのカテゴリから",
                    "13457"=> "ファッション",
                    "2498"=> "食品",
                    "2500"=> "ダイエット、健康",
                    "2501"=> "コスメ、香水",
                    "2502"=> "パソコン、周辺機器",
                    "2504"=> "AV機器、カメラ",
                    "2505"=> "家電",
                    "2506"=> "家具、インテリア",
                    "2507"=> "花、ガーデニング",
                    "2508"=> "キッチン、生活雑貨、日用品",
                    "2503"=> "DIY、工具、文具",
                    "2509"=> "ペット用品、生き物",
                    "2510"=> "楽器、趣味、学習",
                    "2511"=> "ゲーム、おもちゃ",
                    "2497"=> "ベビー、キッズ、マタニティ",
                    "2512"=> "スポーツ",
                    "2513"=> "レジャー、アウトドア",
                    "2514"=> "自転車、車、バイク用品",
                    "2516"=> "CD、音楽ソフト",
                    "2517"=> "DVD、映像ソフト",
                    "10002"=> "本、雑誌、コミック"
                    );

$sortOrder = array(
                   "-score" => "おすすめ順",
                   "+price" => "商品価格が安い順",
                   "-price" => "商品価格が高い順",
                   "+name" => "ストア名昇順",
                   "-name" => "ストア名降順",
                   "-sold" => "売れ筋順"
                   );