<?php
// funcs.phpを参照
require_once("funcs.php");

//1. POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flag = $_POST["kanri_flag"];
$life_flag = $_POST["life_flag"];
$id = $_POST["id"];

// echo $name.$lid.$lpw.$kanri_flag.$life_flag;

//2. DB接続
$pdo= db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_user_table
                        SET
                            name = :name,
                            lid = :lid,
                            lpw = :lpw,
                            kanri_flag = :kanri_flag,
                            life_flag = :life_flag
                        WHERE
                            id = :id;
                        ");
$stmt->bindValue(':name',h($name), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',h($lid), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flag', h($kanri_flag), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flag', h($life_flag), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect('u_select.php');
}
?>