<?php
session_start();

// 如果session裡沒有儲存member_id，重新導向至登入頁面
if (!isset($_SESSION['member_id'])) {
    header("Location: ../register.html");
    exit;
}


?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>最新消息 | 新增資料</title>
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
    </head>
    <style type="text/css">
    /*桌上型電腦：至少要1024px以上 平板電腦：720px～1024px 手機：320px～720px*/
    /*螢幕超過720px的時候*/
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
/*        .login_form{
            width: 500px;
            color: black;
            height: 500px;
            text-align: center;
            box-shadow:0px 2px 5px 1px #cccccc;
            position: absolute;
            top: 9.3%;
            left: 25.9%;
        }*/
        #btn input{
            width:73%; 
            height:6%;
            font-size: 18px;
            background-color:#BDD7EE; 
            color:#FFFFFF; 
            font-weight:600;
            margin-left: 5%;
            border:1.5px solid #BDD7EE;
            margin: 2%;
        }  
        .input_text{
            font-size: 20px;
            margin-left: 1%;
        }
        .formAdd input{
            width:60%; 
            height:12%;
            border:1.5px solid  #D8D8D8;
        }
        .upper-right h1{
            color:#000000; 
            height:26px; 
            font-size:36px; 
            margin-top:7%;
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
                margin-top:0%;
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
    <body background="../picture/最新消息後台底圖.png" style="background-size: 100% 100%;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="manager_newsWeb.php">返回 Back</a>
        </div>
        <div class="login_form" style="z-index: 1; background-color: #FFFFFF;">
            <div class="upper-right">
                <h1>🖊 最新消息 | 新增</h1>
            </div>
            <form action="" method="post" name="formAdd" class="formAdd" id="formAdd" style="color:#787475; font-weight:600;">
                <text class="input_text">標題</text>
                <input type="text" name="fjuTitle" id="fjuTitle" placeholder="請輸入標題" style="margin-left:5%; margin-top:7%;"><br/>
                <text class="input_text">連結</text>
                <input type="text" name="fjuLink" id="fjuLink" placeholder="請輸入連結" style="margin-left:5%; margin-top:5%;"><br/>
                <text class="input_text" style="margin-right:5%;">日期</text>
                <input type="date" name="fjuDate" id="fjuDate" placeholder="請輸入日期" style="margin-top:5%; height:5%;"><br/>
                <label style="display: flex; align-items: center; margin-top:5%;">
                    <text class="input_text"style="margin-left: 13.5%;">置頂</text>
                    <input type="checkbox" name="fjuTopNews" id="fjuTopNews">
                </label>
                <div id="btn" class="btn">
                    <input type="hidden" name="action" value="add">
                    <input type="submit" name="button" value="新增資料" style="margin-top:5.5%;"></br>
                    <input type="reset" name="button2" value="重新填寫" style="margin-top:1.5%;">
                </div>
            </form>
        </div>
    </body>
</html>

<?php

//先檢查請求來源是否是我們上面創建的 form
if (isset($_POST["action"])&&($_POST["action"] == "add")) {

    //引入檔，負責連結資料庫
    include("managerSQL.php");

    //取得請求過來的資料
    $title = $_POST['fjuTitle'];
    $link = $_POST['fjuLink'];
    $date = $_POST['fjuDate'];
    $topnews = isset($_POST['fjuTopNews']) ? 'YES' : 'NO';

    // 新增資料到資料庫表格
    //INSERT INTO 就是新建一筆資料進哪個表的哪個欄位
    $sql_query = "INSERT INTO news (title, link, date, topnews) VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($sql_query);

    if ($stmt === false) {
        die("參數化查詢準備失敗：" . $mysqli->error);
    }

    // 綁定參數
    $stmt->bind_param("ssss", $title, $link, $date, $topnews);

    // 設定變數的值
    $year = $_POST['year'];
    $event = $_POST['event'];

    // 執行查詢
    if ($stmt->execute()) {
        //導航回首頁
        $url = "manager_newsWeb.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
    } else {
        echo "新增資料失敗：" . $stmt->error;
    }

    // 關閉查詢
    $stmt->close();

    // //對資料庫執行查訪的動作
    // mysqli_query($db_link,$sql_query);
}
?>