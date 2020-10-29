<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">データ登録</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="u_select.php">ユーザー管理</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="u_insert.php">
  <div class="jumbotron">
   <fieldset>
    <h1>ユーザー新規登録画面</h1>
     <label>名前:<input type="text" name="name" size="20px"></label><br>
     <label>ユーザーＩＤ：<input type="text" name="lid" size="20px"></label><br>
     <label>パスワード：<input type="text" name="lpw" size="20px"></label><br>
     <label>管理者区分：<input type="radio" name="kanri_flag" value="0">管理者<input type="radio" name="kanri_flag" value="1">スーパー管理者</label><br>
     <label>在職区分：<input type="radio" name="life_flag" value="1">在職<input type="radio" name="life_flag" value="0">退職</label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
