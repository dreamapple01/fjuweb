<?php
    session_start();

    // 如果session裡沒有儲存member_id，重新導向至登入頁面
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
            <h1>🖊 帳號管理 | 修改</h1>
        </div>
        <form action="" method="post" name="formAdd" class="formAdd" id="formAdd" style="color:#787475; font-weight:600;" onsubmit="return confirmUpdate()">
            <text class="input_text">帳號</text>
            <input type="text" name="username" id="username" placeholder="請輸入帳號" value="<?php echo trim($username); ?>" style="margin-left:5%; margin-top:0%;"><br/>
            <text class="input_text">姓名</text>
            <input type="text" name="user" id="user" placeholder="請輸入姓名" value="<?php echo trim($user); ?>" style="margin-left:5%; margin-top:2%;"><br/>
            <text class="input_text">信箱</text>
            <input type="text" name="email" id="email" placeholder="請輸入信箱" value="<?php echo trim($email); ?>" style="margin-left:5%; margin-top:2%;"><br/>
            <text class="input_text">密碼</text>
            <input type="text" name="password" id="password" placeholder="若需修改密碼請輸入" style="margin-left:5%; margin-top:2%;"><br/>
            <div id="btn" class="btn">
                <input type="hidden" name="action" value="update">
                <input type="submit" name="button" value="修改資料" style="margin-top:5%;">
            </div>
        </form>
    </div>
</body>
</html>


<script>
function confirmUpdate() {
    const username = document.getElementById("username").value.trim();
    const user = document.getElementById("user").value.trim();
    const email = document.getElementById("email").value.trim();
    return confirm(`請確認是否修改以下帳號資料？\n\n帳號：${username}\n姓名：${user}\n信箱：${email}`);
}
</script>

<?php
if (isset($_POST["action"]) && $_POST["action"] == 'update') {
    $newUsername = $_POST['username'];
    $newUser = $_POST['user'];
    $newEmail = $_POST['email'];
    $plainPassword = $_POST['password'];

    if (!empty($plainPassword)) {
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        $sql_query = "UPDATE member_table SET username = ?, user = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql_query);
        $stmt->bind_param("ssssi", $newUsername, $newUser, $newEmail, $hashedPassword, $ID);
    } else {
        $sql_query = "UPDATE member_table SET username = ?, user = ?, email = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql_query);
        $stmt->bind_param("sssi", $newUsername, $newUser, $newEmail, $ID);
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
