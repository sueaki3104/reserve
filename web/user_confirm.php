<?php
// POSTデータ確認
// echo'<pre>';
// var_dump($_POST);
// echo'</pre>';
// exit();
session_start();
include('../config/functions.php');
include('../config/config.php');

// 入力チェック DBにデータを格納するときにはデータの欠損は許されない
// そのため，ß以下の条件に合致する場合は以降の処理を中止してエラー画面を表示する．
// 必須項目のデータが送信されていない．
// 必須項目が空で送信されている はエラー
if (
  !isset($_POST['reserve_date']) || $_POST["reserve_date"]=='' ||
  !isset($_POST['reserve_num']) || $_POST["reserve_num"]=='' ||
  !isset($_POST['reserve_time']) || $_POST["reserve_time"]=='' ||
  !isset($_POST['name']) || $_POST["name"]=='' ||
  !isset($_POST['email']) || $_POST["email"]=='' ||
  !isset($_POST['tel']) || $_POST["tel"]=='' ||
  !isset($_POST['comment']) || $_POST["comment"]==''
) {
  exit('必要事項の入力がされていません');
}
// echo'<pre>';
// var_dump($_POST);
// echo'</pre>';
// exit();
// ここまでデータきている

// データの受け取り
$reserve_date = $_POST['reserve_date'];
$reserve_num = $_POST['reserve_num'];
$reserve_time = $_POST['reserve_time'];
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$comment = $_POST['comment'];

// echo'<pre>';
// var_dump($_POST);
// echo'</pre>';
// exit();
// ここまでデータきている

// DBに接続するコードは決まっている（pdo）
$pdo = connect_to_db();

// SQL作成実行
$sql = 'INSERT INTO reserve (id, reserve_date, reserve_time, reserve_num, name, email, tel, comment) 
VALUES (NULL, :reserve_date, :reserve_time, :reserve_num, :name, :email, :tel, :comment)';

// echo'<pre>';
// var_dump($sql);
// echo'</pre>';
// exit();


$stmt = $pdo->prepare($sql);
// バインド変数を設定 PDO::PARAM_STR は「文字列だよ」って事。PDO::PARAM_INTは「数値だぜ」っていう意味。
$stmt->bindValue(':reserve_date', $reserve_date, PDO::PARAM_STR);
$stmt->bindValue(':reserve_time', $reserve_time, PDO::PARAM_STR);
$stmt->bindValue(':reserve_num', $reserve_num, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

//予約者にメール送信
$from='From:Web予約システム<'.ADMIN_EMAIL.'>';
$subject = 'ご予約が確定しました。';
$body = <<<EOT
{$name}様

以下の内容でご予約を承りました。

ご予約内容詳細
[日時]{$reserve_date}{$reserve_time}
[人数]{$reserve_num}人
[氏名]{$name}
[メールアドレス]{$email}
[電話番号]{$tel}
[備考]{$comment}

来院をお待ちしております。
EOT;

//メール送信テストはサーバーを使うようになってから
mb_send_mail($email,$subject,$body,$from);

//店舗管理者にメール送信
$subject = '『店舗用』予約が確定しました。';
$body = <<<EOT

以下の内容で予約が確定しました。

ご予約内容詳細
[日時]{$reserve_date}{$reserve_time}
[人数]{$reserve_num}人
[氏名]{$name}
[メールアドレス]{$email}
[電話番号]{$tel}
[備考]{$comment}
EOT;

//メール送信テストはサーバーを使うようになってから
mb_send_mail(ADMIN_EMAIL,$subject,$body,$from);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// データをcreateで保存したら、画面をinputに戻す
// header("Location:user_complete.php");
// exit();


?>




<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- original CSS -->
    <link href="./css/style.css" rel="stylesheet">

    <title>予約内容確認</title>
  </head>

  <body>
    <header> スマイル歯科🦷 </header>

    <h1>予約内容確認</h1>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">日時</th>
                <td><?= $reserve_date?> <?= $reserve_time ?> </td>
            </tr>
            <tr>
                <th scope="row">人数</th>
                <td><?= $reserve_num?></td>
            </tr>
            <tr>
                <th scope="row">氏名</th>
                <td colspan="2"><?= $name?></td>
            </tr>
            <tr>
                <th scope="row">メールアドレス</th>
                <td colspan="2"><?= $email?></td>
            </tr>
            <tr>
                <th scope="row">電話番号</th>
                <td colspan="2"><?= $tel?></td>
            </tr>
            <tr>
                <th scope="row">備考欄</th>
                <td colspan="2"><?= nl2br($comment)?></td>
            </tr>
        </tbody>
    </table>

        <div class="d-grid gap-2 mx-3">
          <a class="btn btn-primary rounded-pill" href="./user_complete.php"  type="submit">予約確定</a>
          <a class="btn btn-secondary rounded-pill" href="./user_index.php"  type="button">戻る</a>
        </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>