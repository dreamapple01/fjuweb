<?php
session_start();
// 防止 Session Fixation 攻擊（成功登入後會重新產生）
session_regenerate_id(true);

// 關閉錯誤顯示（正式環境）
// error_reporting(0); // 若正式環境需要可以加上這行
// ini_set('display_errors', 0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect.php");

// 確保 POST 變數存在
if (!isset($_POST['username1']) || !isset($_POST['password1'])) {
    echo "<script>alert('非法操作！')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
    exit;
}

// 過濾與限制輸入長度（避免過長造成效能或爆破）
$username = trim($_POST['username1']);
$password = trim($_POST['password1']);

if (strlen($username) > 50 || strlen($password) > 100) {
    echo "<script>alert('帳號或密碼長度異常，請重新輸入')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
    exit;
}

if ($username === "" || $password === "") {
    echo "<script>alert('欄位不得為空值，請再檢查!')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
    exit;
}

// 使用參數化查詢
$sql = "SELECT * FROM member_table WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<script>alert('尚未有此帳號，請註冊!')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
    exit;
}

// 驗證密碼
if (!password_verify($password, $row['password'])) {
    echo "<script>alert('密碼錯誤!請重新登入!')</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
    exit;
}

// 成功登入，設定 session
$_SESSION['member_id'] = $row['id'];
$_SESSION['user'] = htmlspecialchars($row['user'], ENT_QUOTES, 'UTF-8');
$_SESSION['permission'] = htmlspecialchars($row['permission'], ENT_QUOTES, 'UTF-8');

// 安全導向後台
header("Location: homepage_manager.php");
exit;

// 關閉查詢和連線
$stmt->close();
$mysqli->close();
?>
