<?php
session_start();

// 如果session裡沒有儲存member_id，重新導向至登入頁面
if (!isset($_SESSION['member_id'])) {
    header("Location: ../register.html");
    exit;
}

include("connect.php");
// 獲取所有系所資料
$sql = "SELECT * FROM dep_url ORDER BY id ASC";
$result = $mysqli->query($sql);
if (!$result) {
    die("查詢失敗：" . $mysqli->error);
}
// 初始化變數
$current_url = '';
$selected_id = null;
if (isset($_POST['id'])) {
    $selected_id = intval($_POST['id']);
    // 查詢當前網址
    $stmt = $mysqli->prepare("SELECT url FROM dep_url WHERE id = ?");
    $stmt->bind_param("i", $selected_id);
    $stmt->execute();
    $url_result = $stmt->get_result();
    if ($url_result->num_rows > 0) {
        $current_url = $url_result->fetch_assoc()['url'];
    }
    $stmt->close();
}
// 表單提交處理
if(isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $new_url = trim($_POST['new_url']);
    // 獲取原網址
    $stmt = $mysqli->prepare("SELECT url FROM dep_url WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $old_url = $stmt->get_result()->fetch_assoc()['url'];
    $stmt->close();
    if(trim($old_url) !== $new_url) {
        // 更新網址
        $stmt = $mysqli->prepare("UPDATE dep_url SET url = ? WHERE id = ?");
        $stmt->bind_param("si", $new_url, $id);
        if($stmt->execute()) {
            // 獲取當前登入的會員user
            $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
            
            if (!$user && isset($_SESSION['member_id'])) {
                $member_id = $_SESSION['member_id'];
                $user_stmt = $mysqli->prepare("SELECT user FROM member_table WHERE id = ?");
                $user_stmt->bind_param("i", $member_id);
                $user_stmt->execute();
                $user_result = $user_stmt->get_result();
                if ($user_result->num_rows > 0) {
                    $user = $user_result->fetch_assoc()['user'];
                }
                $user_stmt->close();
            }
            // 記錄修改（使用 user 作為 user_id）
            $stmt = $mysqli->prepare("INSERT INTO url_changes (user_id, dep_id, old_url, new_url, change_time) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("siss", $user, $id, $old_url, $new_url);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('修改成功！');</script>";
            $current_url = $new_url;
        } else {
            echo "<script>alert('修改失敗！');</script>";
        }
    } else {
        echo "<script>alert('網址沒有變更！');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
        <title>後臺管理系統 | 輔大校系網站管理</title>
        <style type="text/css">
            .up_div h1{  /*校系網站管理*/
                align:"left";
                margin-left:12%;
            }
            .form-container {
                margin-top:2%;
                width: 77.7%;
                margin-left: auto;
                margin-right: auto;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .form-control {
                width: 100%;
                padding: 8px;
                border: 1.5px solid #C7CDCD;
                border-radius: 4px;
            }
            .btn {
                padding: 8px 15px;
                background-color: #B3C5ED;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: 600;
                margin-top: 10px;
            }
            .btn:hover {
                background-color: #9DB0D9;
            }
            .current-url {
                margin: 15px 0;
                padding: 10px;
                background-color: white;
                border-radius: 4px;
                border: 1.5px solid #C7CDCD;
            }
            .message {
                padding: 10px;
                margin: 10px 0;
                border-radius: 4px;
            }
            .success {
                background-color: #dff0d8;
                color: #3c763d;
            }
            .error {
                background-color: #f2dede;
                color: #a94442;
            }
            .line{ /*長條*/
                background-color:#B3C5ED; 
                width:77.7%; 
                height:10%; 
                margin-left:11.2%; 
                margin-top:-1%; 
                color:#B3C5ED;
            }

            @media (max-width: 1000px){
                .up_div h1{
                    font-size: 200%;
                }
                .form-container {
                    width: 90%;
                }
            }

            @media (max-width: 470px){
                .up_div h1{
                    font-size: 175%;
                }
                .form-container {
                    width: 95%;
                }
            }
        </style>
        <script>
            function showUrlForm() {
                document.getElementById('url-form').style.display = 'block';
            }
        </script>
    </head>
    <body style="background-color:#F9FFFF; font-family: Microsoft JhengHei;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="homepage_manager.php">返回 Back</a>
        </div>
        <div class="up_div">
            <h1 style="display: inline-block;">輔大校系網站管理</h1>
        </div>
           
        <div class="line">11</div>
        
        <div class="form-container">
            <?php if (isset($success_msg)): ?>
                <div class="message success"><?php echo $success_msg; ?></div>
            <?php endif; ?>
            <?php if (isset($error_msg)): ?>
                <div class="message error"><?php echo $error_msg; ?></div>
            <?php endif; ?>
            
            <form method="post" action="">
                <div class="form-group">
                    <label for="department">選擇系所：</label>
                    <select class="form-control" id="department" name="id" onchange="this.form.submit()" required>
                        <option value="">-- 請選擇系所 --</option>
                        <?php
                            $result->data_seek(0); 
                            while($row_result = $result->fetch_assoc()) {
                                $selected = (isset($selected_id) && $selected_id == $row_result['id']) ? 'selected' : '';
                                echo "<option value='".$row_result['id']."' $selected>".$row_result['dep']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </form>
            
            <?php if (!empty($current_url)): ?>
                <div id="url-form">
                <label >原網址：</label><br>
                    <div class="current-url">
                        <a href="<?php echo htmlspecialchars($current_url); ?>" target="_blank"><?php echo htmlspecialchars($current_url); ?></a>
                    </div>
                    
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo isset($selected_id) ? $selected_id : ''; ?>">
                        <div class="form-group">
                            <label for="new_url">新網址：</label>
                            <input type="url" class="form-control" id="new_url" name="new_url" value="<?php echo htmlspecialchars($current_url); ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn">修改網址</button>
                        <a style="font-family: 微軟正黑體; padding: 6px 15px; background-color: #B3C5ED; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 15px; font-weight: bold; position: absolute; right: 12%; margin-top: 5px;" href="view_changes.php">查看修改記錄</a>

                    </form>
                    
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>