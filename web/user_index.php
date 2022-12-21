<?php
session_start();
include('../config/functions.php');

// $err = array();

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     //POSTからデータを受け取る
//     $reserve_date = $_POST['reserve_date'];
//     $reserve_num = $_POST['reserve_num'];
//     $reserve_time = $_POST['reserve_time'];
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $tel = $_POST['tel'];
//     $comment = $_POST['comment'];

//     //各入力値のバリデーション
//     if($reserve_date){
//         $err['reserve_date'] = '予約日を入力してください。';
//     }
//     if($reserve_num){
//         $err['reserve_num'] = '人数を入力してください。';
//     }
//     if($reserve_time){
//         $err['reserve_time'] = '時間を入力してください。';
//     }
//     if($name){
//         $err['name'] = '名前を入力してください。';
//     }
//     if($email){
//         $err['email'] = 'メールアドレスを入力してください。';
//     }
//     if($tel){
//         $err['tel'] = '電話番号を入力してください。';
//     }
//     if($comment){
//         $err['comment'] = '備考欄を入力してください。';
//     }

//         //エラーがなければ次の処理に進む
//         if(empty($err)){

        

//     //各入力値をセッション変数に保存する
    // $_SESSION['RESERVE']['reserve_date'] = $reserve_date;
    // $_SESSION['RESERVE']['reserve_num'] = $reserve_num;
    // $_SESSION['RESERVE']['reserve_time'] = $reserve_time;
    // $_SESSION['RESERVE']['name'] = $name;
    // $_SESSION['RESERVE']['email'] = $email;
    // $_SESSION['RESERVE']['tel'] = $tel;
    // $_SESSION['RESERVE']['comment'] = $comment;

//     //予約確認画面へ変遷する
//     header("Location:user_confirm.php");
//     exit();
// }
// }
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

    <title>診療予約</title>
  </head>

  <body>
    <header> スマイル歯科🦷 </header>

    <h1>診療予約</h1>

    <form class="m-3" action="./user_confirm.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">【１】予約日を選択</label>
            <select class="form-select" name="reserve_date">
                <option selected>日付</option>
                <option value="2022-12-22">2022-12-22</option>
                <option value="2022/12/23">2022/12/23</option>
                <option value="2022/12/24">2022/12/24</option>
                <option value="2022/12/25">2022/12/25</option>
                <option value="2022/12/26">2022/12/26</option>
                <option value="2022/12/27">2022/12/27</option>
                <option value="2022/12/28">2022/12/28</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">【２】人数を選択</label>
            <select class="form-select" name="reserve_num">
                <option selected>人数</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">【３】予約時間を選択</label>
            <select class="form-select" name="reserve_time">
                <option selected>時間</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">【４】予約者情報を入力</label>
            <input type="text" class="form-control" name="name" placeholder="氏名">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="メールアドレス">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="tel" placeholder="電話番号">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">【５】備考欄</label>
            <textarea class="form-control" name="comment" rows="3" placeholder="痛みなどがあればお書きください（入力必須）"></textarea>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-primary rounded-pill" type="submit">確認画面へ</button>
          <button class="btn btn-secondary rounded-pill" type="button">戻る</button>
        </div>
    </form>
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