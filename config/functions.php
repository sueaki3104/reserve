<?php
// My SQL に接続するコード
function connect_to_db()
{
    $dbn = 'mysql:dbname=reserve;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';


    // returnを使う
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
    }
}

//引数で与えられた日付を表示形式に変換する 上手くいかない
// function format_date($yyyymmdd){
//     return date('j',strtotime$yyyymmdd);
// }
