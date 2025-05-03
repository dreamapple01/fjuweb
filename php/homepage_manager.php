
<?php
session_start();

// 如果session裡沒有儲存member_id，重新導向至登入頁面
if (!isset($_SESSION['member_id'])) {
    header("Location: ../register.html");
    exit;
}

// ✅ 確保 $_SESSION['permission'] 有被設置（例如登入時設定）
$permission = $_SESSION['permission'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main-home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 閒置900秒自動跳轉至登入頁面 -->
    <meta http-equiv="refresh" content="900; url=../register.html">  
    <title>招生入口網站 | 後臺管理系統</title>
</head>
<body>
    <div id="back">
        <a style="font-family:微軟正黑體; color:#7B7B7B; text-decoration:none; font-weight:600;" href="../main.html">返回 Back</a>
    </div>
    <div>
        <a style="font-family:微軟正黑體; color:#7B7B7B; text-decoration:none; font-weight:600;" href="logout.php">登出</a>
    </div>

    <div id="main">
        <button class="right_btn font-weight-bold" onclick="window.location.href='manager_newsWeb.php'">最新消息後台管理</button>
        <button class="left_btn font-weight-bold" onclick="window.location.href='manager_historyWeb.php'">輔仁大事記後台管理</button>
        <button class="url_btn font-weight-bold" onclick="window.location.href='manager_url.php'">各系所網站後台管理</button>
        
        <?php if ($permission === '管理者'): ?>
            <button class="account_btn" onclick="window.location.href='manager_memberWeb.php'">帳號管理</button>
        <?php endif; ?>

        <button class="video_btn font-weight-bold" onclick="window.location.href='manager_video.php'">影片管理</button>
    </div>
</body>
</html>
