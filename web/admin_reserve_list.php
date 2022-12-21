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
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>予約リスト</title>
  </head>

  <body>

    <header class="navbar">
         <div class="container-fluid">
            <div class="navbar-brand">スマイル歯科🦷</div>
            <form class="d-flex">
                <a href="./admin_reserve_list.php" class="mx-3"><i class="bi bi-list-task nav-icon"></i></a>
                <a href="./admin_setting.php"><i class="bi bi-gear nav-icon"></i></a>
            </form>
        </div>
    </header>


    <h1>予約リスト</h1>

    <div class="row m-3">  
        <div class="col">
            <select class="form-select" aria-label="Default select example">
            <option selected>2022年</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div>
        <div class="col">
            <select class="form-select" aria-label="Default select example">
            <option selected>12月</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div>
    </div>


    <table class="table">
        <tbody>
            <tr>
                <td>12/22(木)</td>
                <td>17:00</td>
                <td>織田信長 ４名<br>
                tenkafubu@oda.jp<br>
                000-000-0000<br>
                人間50年、下天の内をくらぶれば、夢幻の如くなり</td>
            </tr>
            <tr>
                <td>12/22(木)</td>
                <td>17:00</td>
                <td>織田信長 ４名<br>
                tenkafubu@oda.jp<br>
                000-000-0000<br>
                人間50年、下天の内をくらぶれば、夢幻の如くなり</td>
            </tr>
            <tr>
                <td>12/22(木)</td>
                <td>17:00</td>
                <td>織田信長 ４名<br>
                tenkafubu@oda.jp<br>
                000-000-0000<br>
                人間50年、下天の内をくらぶれば、夢幻の如くなり</td>
            </tr>
            <tr>
                <td>12/22(木)</td>
                <td>17:00</td>
                <td>織田信長 ４名<br>
                tenkafubu@oda.jp<br>
                000-000-0000<br>
                人間50年、下天の内をくらぶれば、夢幻の如くなり</td>
            </tr>





        </tbody>
    </table>




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