<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];
// var_dump($id);

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!-- HTMLを記述 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="stylesheet.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="u_index.php">ユーザー新規登録</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="u_select.php">ユーザー管理</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="u_update.php">
  <div class="jumbotron">
   <fieldset>
    <h1>ユーザー情報更新画面</h1>    
      <label>名前:<input type="text" name="name" size="20px" value=<?= $result['name'] ?>></label><br>
      <label>ユーザーＩＤ：<input type="text" name="lid" size="20px" value=<?= $result['lid'] ?>></label><br>
      <label>パスワード：<input type="text" name="lpw" size="20px" value=<?= $result['lpw'] ?>></label><br>
      <label>管理者区分：<input type="radio" name="kanri_flag" value="0" <?= $result['kanri_flag']==0 ? 'checked':''?>>管理者
                        <input type="radio" name="kanri_flag" value="1" <?= $result['kanri_flag']==1 ? 'checked':''?>>スーパー管理者</label><br>
      <label>在職区分：<input type="radio" name="life_flag" value="1" <?= $result['life_flag']==1 ? 'checked':''?>>在職
                      <input type="radio" name="life_flag" value="0" <?= $result['life_flag']==0 ? 'checked':''?>>退職</label><br>
      <input type="hidden" name="id" value=<?= $result['id'] ?>>
      <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>

</html>
