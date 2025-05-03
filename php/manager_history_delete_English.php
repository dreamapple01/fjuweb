
<?php
session_start();

// 如果session裡沒有儲存member_id，重新導向至登入頁面
if (!isset($_SESSION['member_id'])) {
    header("Location: ../register.html");
    exit;
}


?>
<?php

    //取得資料的ID
    $Id = $_GET['id'];
    include ('managerSQL.php');

    //將此ID的資料從資料庫刪除
    $sql_query = "DELETE FROM history_english WHERE id = ?";

    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    // 綁定參數
    $stmt->bind_param("s", $Id);

    // 執行查詢
    if ($stmt->execute()) {
        header("Location: manager_historyWeb_English.php");
    } else {
        echo "失敗：" . $stmt->error;
    }
    
    // 關閉查詢
    $stmt->close();

    // mysqli_query($db_link,$sql_query);
    // $db_link->close();
    // header("Location: manager_historyWeb_English.php");
?>