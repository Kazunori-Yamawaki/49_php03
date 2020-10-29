<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");

$id = $_GET['id'];

// DB接続
$pdo= db_conn();

//３．データ削除SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
    sql_error($stmt);
}else{
    //*** function化する！*****************
    // header("Location: index.php");
    // exit();
    redirect('select.php');
}

?>