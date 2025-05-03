<html>
    <head>
        <meta charset="UTF-8" />
        <title>帳號管理 | 新增</title>
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
    <style type="text/css">
        .login_form {
            width: 500px;
            color: black;
            height: 500px;
            text-align: center;
            box-shadow: 0px 2px 5px 1px #cccccc;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #btn input {
            width: 73%;
            height: 6%;
            font-size: 18px;
            background-color: #D3CBF0;
            color: #FFFFFF;
            font-weight: 600;
            margin-left: 5%;
            border: 1.5px solid #D3CBF0;
        }
        .input_text {
            font-size: 20px;
            margin-left: 5%;
        }
        .formAdd {
            margin-top: 10%;
        }
        .formAdd input {
            width: 60%;
            height: 12%;
            border: 1.5px solid #D8D8D8;
        }
        .upper-right h1 {
            color: #000000;
            height: 30px;
            font-size: 36px;
            margin-top: 10%;
        }

        @media (max-width: 720px) { /*螢幕寬度於470-720px的時候*/
            .login_form{
                width: 70%;
                color: black;
                height: 65%;
                text-align: center;
                box-shadow:0px 2px 5px 1px #cccccc;
                position: absolute;
                /*top: 7%;*/
                justify-content: center; /* 垂直置中 */
                align-items: center;    
                /*left: 15%;*/
            }
            #btn input{
                width:73%; 
                height:6%;
                font-size: 15px;
                background-color:#D3CBF0; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #D3CBF0;
                margin: 2%;
            }  
            .input_text{
                font-size: 18px;
                margin-left: 5%;
            }
            .formAdd{
                margin-top:10%;
            }
            .formAdd input{
                width:60%; 
                height:12%;
                border:1.5px solid  #D8D8D8;
                margin: 1%;
            }
            .upper-right h1{
                color:#000000; 
                height:28px; 
                font-size:32px; 
                margin-top:10%;
            }
        }

        @media (max-width: 470px) { /*螢幕寬度小於470px的時候*/
            .login_form{
                width: 70%;
                color: black;
                height: 50%;
                text-align: center;
                box-shadow:0px 2px 5px 1px #cccccc;
                position: absolute;
                /*top: 7%;*/
                justify-content: center; /* 垂直置中 */
                align-items: center;    
                /*left: 15%;*/
            }
            #btn input{
                width:73%; 
                height:7%;
                font-size: 14px;
                background-color:#D3CBF0; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #D3CBF0;
                margin: 2%;
            }  
            .input_text{
                font-size: 15px;
                margin-bottom: 5%;
            }
            .formAdd{
                margin-top:10%;
            }
            .formAdd input{
                width:60%; 
                height:12%;
                border:1.5px solid  #D8D8D8;
                margin: 1%;
            }
            .upper-right h1{
                color:#000000; 
                height:28px; 
                font-size:25px; 
                margin-top:10%;
            }
        }

    </style>
    </head>
    <body background="../picture/帳號後臺底圖.jpg" style="background-size: 100% 100%;">
    <div id="back">
        <a style="font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" href="manager_memberWeb.php">返回 Back</a>
    </div>
    <div class="login_form" style="z-index: 1; background-color: #FFFFFF;">
        <div class="upper-right">
            <h1>🖊 帳號管理 | 新增</h1>
        </div>
        <form action="" method="post" name="formAdd" class="formAdd" id="formAdd" style="color:#787475; font-weight:600;" onsubmit="return confirmSubmit()">
            <text class="input_text">帳號</text>
            <input type="text" name="username" id="username" placeholder="請輸入帳號" style="margin-left:5%; margin-top:0%;"><br/>
            <text class="input_text">姓名</text>
            <input type="text" name="user" id="user" placeholder="請輸入姓名" style="margin-left:5%; margin-top:2%;"><br/>
            <text class="input_text">密碼</text>
            <input type="text" name="password" id="password" placeholder="請輸入密碼" style="margin-left:5%; margin-top:2%;"><br/>
            <text class="input_text">信箱</text>
            <input type="text" name="email" id="email" placeholder="請輸入信箱" style="margin-left:5%; margin-top:2%;"><br/>
            <div id="btn" class="btn">
                <input type="hidden" name="action" value="add">
                <input type="submit" name="button" value="新增資料" style="margin-top:3%;"><br/>
                <input type="reset" name="button2" value="重新填寫" style="margin-top:1%;">
            </div>
        </form>
    </div>
    </body>
</html>
<script>
function confirmSubmit() {
    const username = document.getElementById("username").value.trim();
    const user = document.getElementById("user").value.trim();
    const password = document.getElementById("password").value.trim();
    const email = document.getElementById("email").value.trim();

    if (!username || !user || !password || !email) {
        alert("請完整輸入帳號、姓名、密碼與信箱！");
        return false;
    }

    return confirm(`請確認是否新增以下帳號：\n\n帳號：${username}\n姓名：${user}\n信箱：${email}`);
}
</script>

<?php
if (isset($_POST["action"]) && $_POST["action"] == "add") {
    include("connect.php");

    $username = $_POST['username'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password_plain = $_POST['password'];

    // 檢查帳號是否已存在
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

    // 密碼加密
    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

    // 新增資料
    $sql_query = "INSERT INTO member_table (username, user, password, email) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    $stmt->bind_param("ssss", $username, $user, $password_hashed, $email);

    if ($stmt->execute()) {
        echo "<script>window.location.href='manager_memberWeb.php';</script>";
    } else {
        echo "新增資料失敗：" . $stmt->error;
    }

    $stmt->close();
    $check_stmt->close();
}
?>