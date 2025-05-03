<?php
    session_start();
    include("connect.php");
    header("Content-type: text/html; charset=utf-8");

    $slcdb = mysqli_select_db($db_link, "fjuweb");
    $message = "";

    // 處理 AJAX 請求
    if(isset($_POST['urlValue'])) {
        $url = $_POST['urlValue'];
        $userId = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : 0;

        // 記錄詳細的用戶信息
        error_log("Saving URL: $url by user ID: $userId at " . date('Y-m-d H:i:s'));

        $sql = "INSERT INTO video_url (url, modifier_id, modify_time) 
                VALUES (?, ?, NOW())";
        
        $stmt = mysqli_prepare($db_link, $sql);
        mysqli_stmt_bind_param($stmt, "si", $url, $userId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "修改成功";
        } else {
            echo "錯誤: " . mysqli_error($db_link);
        }
        mysqli_stmt_close($stmt);
        exit(); // AJAX 請求不需要繼續輸出 HTML
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
        <title>後臺管理系統 | 主頁影片</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style type="text/css">
            .up_div h1{  /*最新消息資料管理標題*/
                align:"left";
                margin-left:7.3%;
            }
            .table{
                margin-top:2%;
                /*邊框合併*/
                border-collapse:collapse;
                border:1.5px solid  #C7CDCD;
                width:85.5%;
            }
            table tr{
                font-size: 12px;
            }
            .table a{
                text-decoration:none;
                color: #819FBD;
            }
            .btn_add{
                text-decoration:none; 
                background-color:#9DC3E7; 
                color:white; 
                font-weight:600;  
                width:125px;        
                height:40px;
                border:1.5px solid  #9DC3E7;
                position: absolute;
                right: 0;
                margin-right:7.9%;
                margin-top:1%;
            }
            .line{
                background-color:#9DC3E7; 
                width:85.5%; 
                height:10%; 
                margin-left:7.3%; 
                margin-top:-1%; 
                color:#9DC3E7;
            }

            .url-input{
                width: 80%;
            }

            button{
                border-radius:4px;
                width: 10%;
                background-color: #C7CDCD;
                font-family:'微軟正黑體';
            }

            .input{
                width:60%; 
                height:10%; 
                margin-left:7.3%; 
                margin-top:1%; 
            }
            @media (max-width: 1000px){ /*螢幕最大寬度介於470-1000px的時候*/
                .up_div h1{  /*最新消息資料管理標題*/
                    align:"left";
                    margin-left:7.3%;
                    font-size: 190%;
                }
                .table{
                    margin-top:2%;
                    /*邊框合併*/
                    border-collapse:collapse;
                    border:1.5px solid  #C7CDCD;
                    width:85.5%;
                }
                table tr{
                    font-size: 12px;
                }
                .table a{
                    text-decoration:none;
                    color: #819FBD;
                }
                .btn_add{
                    text-decoration:none; 
                    background-color:#9DC3E7; 
                    color:white; 
                    font-weight:600;  
                    width:100px;        
                    height:40px;
                    border:1.5px solid  #9DC3E7;
                    position: absolute;
                    right: 0;
                    margin-right:8.2%;
                    margin-top:2%;
                }
                .line{
                    background-color:#9DC3E7; 
                    width:85.5%; 
                    height:10%; 
                    margin-left:7.3%; 
                    margin-top:-1%; 
                    margin-bottom:1%; 
                    color:#9DC3E7;
                }
            }

            @media (max-width: 470px){ /*螢幕最大寬度小於470px的時候*/
                .up_div h1{  /*最新消息資料管理標題*/
                    align:"left";
                    margin-left:7.3%;
                    font-size: 175%;
                }
                .table{
                    margin-top:2%;
                    /*邊框合併*/
                    border-collapse:collapse;
                    border:1.5px solid  #C7CDCD;
                    width:85.5%;
                }
                table tr{
                    font-size: 12px;
                }
                .table a{
                    text-decoration:none;
                    color: #819FBD;
                }
                .btn_add{
                    text-decoration:none; 
                    background-color:#9DC3E7; 
                    color:white; 
                    font-weight:600;  
                    width:20%;        
                    height:40px;
                    border:1.5px solid  #9DC3E7;
                    position: absolute;
                    right: 0;
                    margin-right:9%;
                    margin-top:5%;
                }
                .line{
                    background-color:#9DC3E7; 
                    width:85.5%; 
                    height:10%; 
                    margin-left:7.3%; 
                    margin-top:-1%; 
                    margin-bottom:5%; 
                    color:#9DC3E7;
                } 
            }
        </style>
    </head>
    <body style="background-color:#F9FFFF; font-family: Microsoft JhengHei;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="homepage_manager.php">返回 Back</a>
        </div>
        <div class="up_div">
            <h1 style="display: inline-block;">主頁影片管理</h1>
        </div>
        
        <script>
        function saveUrl() {
            let urlValue = document.getElementById("urlInput").value;
            
            if (urlValue.trim() === "") {
                alert("請輸入有效的網址");
                return;
            }

            // URL 轉換邏輯
            if(urlValue.includes('youtu.be/')){
                urlValue = urlValue.split('?')[0];
                urlValue = urlValue.replace('youtu.be/', 'www.youtube.com/embed/') + '?autoplay=1&mute=1&loop=1';
            }
            else if(urlValue.includes('watch?v=')){
                if(urlValue.includes('list')){
                    let a = urlValue.split('watch?v=')[0] + 'embed/';
                    let b = 'videoseries?list=' + urlValue.split('list=')[1] + '&autoplay=1&mute=1&loop=1';
                    urlValue = a + b;
                }
                else{
                    urlValue = urlValue.replace('watch?v=', 'embed/') + '?autoplay=1&mute=1&loop=1';
                }
            }

            document.getElementById('urlInput').value = '';

            $.ajax({
                type: "POST",
                url: window.location.href, // 改為當前頁面 URL
                data: { "urlValue": urlValue },
                success: function() {
                    alert("修改成功");
                    location.reload(); 
                }
            })
        }
        </script>
        
        <div class="line">11</div>
        <div class='input'>
            <input type="text" class="url-input" placeholder="請輸入網址" id='urlInput'>
            <button onclick="saveUrl()">確認</button>
        </div>

        <div class="up_div">
            <h1 style="display: inline-block;">修改紀錄</h1>
        </div>
        <div class="line">11</div>
        <div class="view">
        <table border="1" align = "center" class="table" cellpadding="5">
            <tr>
                <th>編號</th>
                <th>網址</th>
                <th>修改者</th>
                <th>修改時間</th>
            </tr>
            <?php
            include("connect.php");

            $slcdb = mysqli_select_db($db_link, "fjuweb");

            $sql_query = "SELECT v.*, m.user AS modifier_name 
                        FROM video_url v
                        LEFT JOIN member_table m ON v.modifier_id = m.id 
                        ORDER BY v.id ASC";
                        
            $result = mysqli_query($db_link, $sql_query);

            if ($result) {
                
                if (mysqli_num_rows($result) > 0) {
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["url"] . "</td>";
                        echo "<td>" . ($row["modifier_name"] ? $row["modifier_name"] : "-") . "</td>";
                        echo "<td>" . $row["modify_time"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>無記錄</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>查詢錯誤: " . mysqli_error($db_link) . "</td></tr>";
            }
            mysqli_close($db_link);
            ?>
        </table>
        </div>
        

    </body>
</html>