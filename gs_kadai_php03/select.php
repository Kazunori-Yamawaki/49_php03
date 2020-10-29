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
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
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
    $url = $result['url'];
    $comment = $result['comment'];
      $view .= '<tr>';
      $view .= '<td>'.$id.'</td>';
      $view .= '<td>'.$name.'</td>';
      $view .= '<td><a href="'.$url.'" target="_blank">リンク先</a></td>';
      $view .= '<td>'.$comment.'</td>';
      $view .= '<td><a href="detail.php?id='.$id.'">更新</a></td>';
      $view .= '<td><a href="delete.php?id='.$id.'">削除</a></td>';
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
<title>ブックマーク一覧</title>
<link rel="stylesheet" href="stylesheet.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<table>
<tr>
<th>番号</th><th>店名</th><th>URL</th><th>コメント</th><th>更新</th><th>削除</th>
</tr>
<?= $view ?>
</table>

<!-- Main[End] -->

</body>
</html>
