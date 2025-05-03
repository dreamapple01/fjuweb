<?php
    session_start();

    // 如果session裡沒有儲存member_id，重新導向至登入頁面
    if (!isset($_SESSION['member_id'])) {
        header("Location: ../register.html");
        exit;
    }
	include "connect.php";

    $ID = $_GET['id'];

    $sql_query = "SELECT * FROM news WHERE id = ?";

    $stmt = $mysqli->prepare($sql_query);

    // 綁定參數
    $stmt->bind_param("i", $ID);

    // 執行查詢
    if ($stmt->execute()) {
        // 取得查詢結果
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // 得到此筆資料的id、year、event
            $row_result = $result->fetch_assoc();
            //得到此筆資料的id、title、link、date
            $id = $row_result['id'];
            $title = $row_result['title'];
            $link = $row_result['link'];
            $date = $row_result['date'];
            $topnews = $row_result['topnews'];
        } else {
            // 沒有符合的資料
            echo "找不到對應資料。";
        }
    } else {
        echo "查詢失敗：" . $stmt->error;
    }

    // 關閉查詢
    $stmt->close();

?>


<html>
	<head>
		<meta charset="UTF-8" />
		<title>最新消息 | 修改資料</title>
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
		<style type="text/css">
		.login_form{
            width: 500px;
            color: black;
            height: 500px;
            text-align: center;
            box-shadow:0px 2px 5px 1px #cccccc;
            position: absolute;
            /*top: 5%;*/
            /*left: 32%;*/
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #btn input{
            width:73%; 
            height:6%;
            font-size: 18px;
            background-color:#BDD7EE; 
            color:#FFFFFF; 
            font-weight:600;
            margin-left: 5%;
            border:1.5px solid #BDD7EE;
        }  
        .input_text{
            font-size: 20px;
            margin-left: 5%;
        }
        .formAdd{
            margin-top:10%;
        }
        .formAdd input{
            width:60%; 
            height:10%;
            border:1.5px solid  #D8D8D8;
        }
        .upper-right h1{
            color:#000000; 
            height:30px; 
            font-size:36px; 
            margin-top:10%;
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
                background-color:#BDD7EE; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #BDD7EE;
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
                background-color:#BDD7EE; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #BDD7EE;
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

	<body background="../picture/最新消息後台底圖.png" style="background-size: 100% 100%;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="manager_newsWeb.php">返回 Back</a>
        </div>
		<div class="login_form" style="z-index: 1; background-color: #FFFFFF;">
            <div class="upper-right">
                <h1>🖊 最新消息 | 修改</h1>
            </div>
            <form action="" method="post" name="formAdd" class="formAdd" id="formAdd" style="color:#787475; font-weight:600;">
                <text class="input_text">ID</text>
                <input type="text" name="fjuId" id="fjuId" placeholder="請輸入ID" value="<?php echo $id ?>" style="margin-left:8%;"><br/>
                <text class="input_text">標題</text>
                <input type="text" name="fjuTitle" id="fjuTitle" placeholder="請輸入標題" value=" <?php echo $title ?>" style="margin-left:5%; margin-top:4%;"><br/>
                <text class="input_text">連結</text>
                <input type="text" name="fjuLink" id="fjuLink" placeholder="請輸入連結" value=" <?php echo $link ?>" style="margin-left:5%; margin-top:4%;"><br/>
                <text class="input_text" style="margin-right:5%;">日期</text>
                <input type="date" name="fjuDate" id="fjuDate" placeholder="請輸入日期" value="<?php echo $date ?>" style="margin-top:5%; height:4%;"><br/>
                <label style="display: flex; align-items: center; margin-top:5%;">
                    <text class="input_text"style="margin-left: 15.5%;">置頂</text>
                    <input type="checkbox" name="fjuTopNews" id="fjuTopNews" <?php echo $topnews === 'YES' ? 'checked' : '' ?>>
                </label>
                <div id="btn" class="btn">
					<input type="hidden" name="action" value="update">
					<input type="submit" name="button" value="修改資料" style="margin-top:5%;">
                </div>
            </form>
        </div>
	</body>
</html>


<?php
 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

    $newTitle = $_POST['fjuTitle'];
    $newLink = $_POST['fjuLink'];
    $newDate = $_POST['fjuDate'];
    $newTopNews = isset($_POST['fjuTopNews']) ? 'YES' : 'NO';

    $sql_query = "UPDATE news SET title = ?, link = ?, date = ?, topnews = ? ,modifier_id = ?, modify_time = NOW() WHERE id = ?";
    
    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    // 綁定參數
    $modifier_id = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : NULL;
    $stmt->bind_param("sssssi", $newTitle, $newLink, $newDate, $newTopNews, $modifier_id, $ID);

    // 執行查詢
    if ($stmt->execute()) {
        //導航回首頁
        $url = "manager_newsWeb.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
    } else {
        echo "失敗：" . $stmt->error;
    }

    // 關閉查詢
    $stmt->close();

    // mysqli_query($db_link,$sql_query);
    // $db_link->close();

    //導航回首頁
    // header("Location: manager_newsWeb.php");
 }
 ?>