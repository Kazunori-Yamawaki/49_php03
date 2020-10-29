<?php
require_once("funcs.php");

//1.  DB接続します
$pdo = db_conn();

// try {
//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $id = $result['id'];
    $name = $result['name'];
    $lid = $result['lid'];
    $lpw = $result['lpw'];
    $kanri_flag = $result['kanri_flag'];
    $life_flag = $result['life_flag'];
      $view .= '<tr>';
      $view .= '<td>'.$id.'</td>';
      $view .= '<td>'.$name.'</td>';
      $view .= '<td>'.$lid.'</td>';
      $view .= '<td>'.$lpw.'</td>';
      $view .= '<td>'.$kanri_flag.'</td>';
      $view .= '<td>'.$life_flag.'</td>';
      $view .= '<td><a href="u_detail.php?id='.$id.'">更新</a></td>';
      $view .= '<td><a href="u_delete.php?id='.$id.'">削除</a></td>';
      $view .= '</tr>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー管理画面</title>
<link rel="stylesheet" href="stylesheet.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="u_index.php">ユーザー新規登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h1>ユーザー管理画面</h1>
<table>
<tr>
<th>番号</th><th>名前</th><th>ユーザーＩＤ</th><th>パスワード</th><th>管理区分</th><th>在職区分</th><th>更新</th><th>削除</th>
</tr>
<?= $view ?>
</table>

<!-- Main[End] -->

</body>
</html>
