<?php
session_start();

if (!isset($_SESSION['member_id'])) {
    header("Location: ../register.html");
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8" />
    <title>帳號管理 | 新增</title>
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
        #btn input[type="submit"], #btn input[type="reset"] {
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
        #btn input[type="submit"]:hover, #btn input[type="reset"]:hover {
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
        <h1>🖊 帳號管理 | 新增</h1>
        <form action="" method="post" name="formAdd" class="formAdd" onsubmit="return confirmSubmit()">
            <label for="username">帳號</label>
            <input type="text" name="username" id="username" placeholder="請輸入帳號">

            <label for="user">姓名</label>
            <input type="text" name="user" id="user" placeholder="請輸入姓名">

            <label for="password">密碼</label>
            <input type="text" name="password" id="password" placeholder="請輸入密碼">

            <label for="email">信箱</label>
            <input type="text" name="email" id="email" placeholder="請輸入信箱">

            <label for="permission">權限</label>
            <select name="permission" id="permission">
                <option value="使用者" selected>使用者</option>
                <option value="管理者">管理者</option>
            </select>

            <div id="btn">
                <input type="hidden" name="action" value="add">
                <input type="submit" name="button" value="新增資料">
                <input type="reset" name="button2" value="重新填寫">
            </div>
        </form>
    </div>
    <script>
        function confirmSubmit() {
            const username = document.getElementById("username").value.trim();
            const user = document.getElementById("user").value.trim();
            const password = document.getElementById("password").value.trim();
            const email = document.getElementById("email").value.trim();
            const permission = document.getElementById("permission").value.trim();

            if (!username || !user || !password || !email || !permission) {
                alert("請完整輸入帳號、姓名、密碼、信箱與權限！");
                return false;
            }

            return confirm(`請確認是否新增以下帳號：\n\n帳號：${username}\n姓名：${user}\n信箱：${email}\n權限：${permission}`);
        }
    </script>
</body>
</html>

<?php
if (isset($_POST["action"]) && $_POST["action"] == "add") {
    include("connect.php");

    $username = $_POST['username'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password_plain = $_POST['password'];

    $check_sql = "SELECT COUNT(*) as count FROM member_table WHERE username = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $check_row = $check_result->fetch_assoc();

    if ($check_row['count'] > 0) {
        echo "<script>alert('此帳號已存在！請使用其他帳號名稱');</script>";
        exit;
    }

    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

    $permission = $_POST['permission'];
    $sql_query = "INSERT INTO member_table (username, user, password, email, permission) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    $stmt->bind_param("sssss", $username, $user, $password_hashed, $email, $permission);

    if ($stmt->execute()) {
        echo "<script>
            alert('新增成功！');
            window.location.href='manager_memberWeb.php';
        </script>";
    } else {
        echo "新增資料失敗：" . $stmt->error;
    }

    $stmt->close();
    $check_stmt->close();
}
?>
