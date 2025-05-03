<?php
    session_start();
	include "connect.php";
    if (!isset($_SESSION['member_id'])) {
        header("Location: ../register.html");
        exit;
    }
    $ID = $_GET['id'];

    $sql_query = "SELECT * FROM history_english WHERE id = ?";

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
            //得到此筆資料的id、year、event
            $id = $row_result['id'];
            $year = $row_result['year'];
            $event = $row_result['event'];
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
		<title>輔仁大事記 | 修改資料</title>
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
            background-color:#B3C5ED; 
            color:#FFFFFF; 
            font-weight:600;
            margin-left: 5%;
            border:1.5px solid #B3C5ED;
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
            height:12%;
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
                background-color:#B3C5ED; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #B3C5ED;
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
                background-color:#B3C5ED; 
                color:#FFFFFF; 
                font-weight:600;
                margin-left: 5%;
                border:1.5px solid #B3C5ED;
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
	<body background="../picture/大事記後台底圖.png" style="background-size: 100% 100%;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="manager_historyWeb_English.php">返回 Back</a>
        </div>
		<div class="login_form" style="z-index: 1; background-color: #FFFFFF;">
            <div class="upper-right">
                <h1>🖊 輔仁大事記 | 修改</h1>
            </div>
            <form action="" method="post" name="formAdd" class="formAdd" id="formAdd" style="color:#787475; font-weight:600; ">
                <text class="input_text">ID</text>
                <input type="text" name="fjuId" id="fjuId" placeholder="請輸入ID" value=" <?php echo $id ?>" style="margin-left:8%; margin-top:5%;"><br/>
                <text class="input_text">年份</text>
                <input type="text" name="fjuYear" id="fjuYear"  placeholder="請輸入年份" value=" <?php echo $year ?>" style="margin-left:5%; margin-top:5%;"><br/>
                <text class="input_text">事件</text>
                <input type="text" name="fjuEvent" id="fjuEvent"placeholder="請輸入事件" value="<?php echo $event ?>"  style="margin-left:5%; margin-top:5%;"><br/>
                <div id="btn" class="btn">

					<input type="hidden" name="action" value="update">
					<input type="submit" name="button" value="修改資料" style="margin-top:8%;">
                </div>
            </form>
        </div>
<!-- 		<form action="" method="post" name="formAdd" id="formAdd">
		請輸入ID：<input type="text" name="fjuId" id="fjuId" value=" <?php echo $id ?>"><br/>
		請輸入年份：<input type="text" name="fjuYear" id="fjuYear" value=" <?php echo $year ?>"><br/>
		請輸入事件：<textarea name="fjuEvent" id="fjuEvent" value="<?php echo $event ?>" style="height:200px; width:700px; word-break:break-all"></textarea><br/>
		<input type="hidden" name="action" value="update">
		<input type="submit" name="button" value="修改資料">
		</form> -->
	</body>
</html>


<?php
 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

    $newYear = $_POST['fjuYear'];
    $newEvent = $_POST['fjuEvent'];

    // 新增資料到資料庫表格
    $sql_query = "UPDATE history_english SET year = ?, event = ?, modifier_id = ?, modify_time = NOW() WHERE id = ?";

    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    // 綁定參數
    $modifier_id = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : NULL;
    $stmt->bind_param("sssi", $newYear, $newEvent, $modifier_id, $ID);
 
    // 顯示表連接的具體SQL和結果
    echo "<pre>SQL: $sql_query</pre>";

    // 執行查詢
    if ($stmt->execute()) {
        //導航回首頁
        $url = "manager_historyWeb_English.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
    } else {
        echo "失敗：" . $stmt->error;
    }

    // 關閉查詢
    $stmt->close();

    // $sql_query = "UPDATE history_english SET year = '$newYear', event = '$newEvent' WHERE id = $ID";

    // mysqli_query($db_link,$sql_query);
    // $db_link->close();
     
    // $url = "manager_historyWeb_English.php";
    // echo "<script type='text/javascript'>";
    // echo "window.location.href='$url'";
    // echo "</script>"; 
    // header('Location: manager_historyWeb_English.php');
 }
 ?>