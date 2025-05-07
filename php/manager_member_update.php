<?php
    session_start();

    if (!isset($_SESSION['member_id'])) {
        header("Location: ../register.html");
        exit;
    }

    include "connect.php";

    $ID = $_GET['id'];

    $sql_query = "SELECT * FROM member_table WHERE id = ?";
    $stmt = $mysqli->prepare($sql_query);
    $stmt->bind_param("i", $ID);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row_result = $result->fetch_assoc();
            $username = $row_result['username'];
            $user = $row_result['user'];
            $email = $row_result['email'];
            $permission = $row_result['permission'];
        } else {
            echo "找不到對應資料。";
        }
    } else {
        echo "查詢失敗：" . $stmt->error;
    }
    $stmt->close();
?>

<html>
<head>
    <meta charset="UTF-8" />
    <title>帳號管理 | 修改</title>
    <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
    <style type="text/css">
        body {
            background-image: url('../picture/帳號後臺底圖.jpg');
            background-size: cover;
            margin: 0;
            font-family: 微軟正黑體;
        }
        .login_form {
            width: 500px;
            max-width: 90%;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            border-radius: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .login_form h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .formAdd {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .formAdd label {
            text-align: left;
            font-weight: bold;
            color: #555;
        }
        .formAdd input[type="text"], .formAdd select {
            padding: 8px 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .formAdd select {
            background-color: #fff;
        }
        #btn input[type="submit"] {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color:rgb(190, 187, 235);
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #btn input[type="submit"]:hover {
            background-color:rgb(169, 165, 224);
        }
        #back {
            position: absolute;
            top: 10px;
            left: 20px;
        }
        #back a {
            color: #7B7B7B;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div id="back">
        <a href="manager_memberWeb.php">返回 Back</a>
    </div>
    <div class="login_form">
        <h1>🖊 帳號管理 | 修改</h1>
        <form method="post" name="formAdd" class="formAdd" onsubmit="return confirmUpdate()">
            <label for="username">帳號</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">

            <label for="user">姓名</label>
            <input type="text" name="user" id="user" value="<?php echo htmlspecialchars($user); ?>">

            <label for="email">信箱</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="password">密碼</label>
            <input type="text" name="password" id="password" placeholder="若需修改密碼請輸入">

            <label for="permission">權限</label>
            <select name="permission" id="permission">
                <option value="">請選擇權限</option>
                <option value="管理者" <?php if ($permission == '管理者') echo 'selected'; ?>>管理者</option>
                <option value="使用者" <?php if ($permission == '使用者') echo 'selected'; ?>>使用者</option>
            </select>

            <div id="btn">
                <input type="hidden" name="action" value="update">
                <input type="submit" name="button" value="修改資料">
            </div>
        </form>
    </div>

    <script>
    function confirmUpdate() {
        const username = document.getElementById("username").value.trim();
        const user = document.getElementById("user").value.trim();
        const email = document.getElementById("email").value.trim();
        const permission = document.getElementById("permission").value.trim();
        return confirm(`請確認是否修改以下帳號資料？\n\n帳號：${username}\n姓名：${user}\n信箱：${email}\n權限：${permission}`);
    }
    </script>
</body>
</html>

<?php
if (isset($_POST["action"]) && $_POST["action"] == 'update') {
    $newUsername = $_POST['username'];
    $newUser = $_POST['user'];
    $newEmail = $_POST['email'];
    $plainPassword = $_POST['password'];
    $newPermission = $_POST['permission'];

    if (!empty($plainPassword)) {
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        $sql_query = "UPDATE member_table SET username = ?, user = ?, email = ?, password = ?, permission = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql_query);
        $stmt->bind_param("sssssi", $newUsername, $newUser, $newEmail, $hashedPassword, $newPermission, $ID);
    } else {
        $sql_query = "UPDATE member_table SET username = ?, user = ?, email = ?, permission = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql_query);
        $stmt->bind_param("ssssi", $newUsername, $newUser, $newEmail, $newPermission, $ID);  
    }

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    if ($stmt->execute()) {
        echo "<script>window.location.href='manager_memberWeb.php';</script>";
    } else {
        echo "失敗：" . $stmt->error;
    }

    $stmt->close();
}
?>
