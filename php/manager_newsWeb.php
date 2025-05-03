<?php
    session_start();
    include("managerSQL.php");

    $sql_query = "SELECT n.*, m.user AS modifier_name 
              FROM news n
              LEFT JOIN member_table m ON n.modifier_id = m.id 
              ORDER BY n.id ASC";
    $result = $mysqli->query($sql_query);
    if (!$result) {
        die("查詢失敗：" . $mysqli->error);
    }
    
    //取得資料筆數
    $total_records = $result->num_rows;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../picture/輔大校徽/0純校徽.gif">
        <title>後臺管理系統 | 最新消息</title>
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
                width:95%;
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
                width:95%; 
                height:10%; 
                margin-left:2.5%; 
                margin-top:-1%; 
                color:#9DC3E7;
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
            <h1 style="display: inline-block;">最新消息資料管理</h1>
        </div>
            <p style="text-align:right; margin-right:7.5%; margin-top:-2.5%">目前資料筆數：<?php echo $total_records;?></p>
        
        <div class="line">11</div>
        <table border="1" align = "center" class="table" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>標題</th>
                <th>連結</th>
                <th>日期</th>
                <th>修改時間</th>
                <th>置頂</th>
            </tr>
            <!-- 找不到問題
             -->
        <script>
            function updateCheckboxValue(checkbox, id) {
                var newValue = checkbox.checked ? "YES" : "NO";
                console.log(newValue);
                console.log(id); 
                // 建立資料庫連線
                var db_link = mysqli_connect("localhost", "root", "fjuweb");

                // 準備 SQL 語法
                var sql_query = "UPDATE `news` SET `topnews` = '" + newValue + "' WHERE id = " + id;

                // 執行 SQL 語法
                mysqli_query(db_link, sql_query);

                // 關閉資料庫連線
                mysqli_close(db_link);
            }
        </script>
        <?php

            while($row_result = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='text-align: center; vertical-align:middle;'>".$row_result['id']."</td>";
                // 只在有修改時間時顯示修改者，否則顯示 "-"
                if (!empty($row_result['modify_time'])) {
                    echo "<td style='text-align: center; vertical-align:middle;'>" . 
                        (empty($row_result['modifier_name']) ? "-" : $row_result['modifier_name']) . "</td>";
                } else {
                    echo "<td style='text-align: center; vertical-align:middle;'>-</td>";
                }
                echo "<td>".$row_result['title']."</td>";
                echo "<td style='word-break: break-all;'>".$row_result['link']."</td>";
                echo "<td>".$row_result['date']."</td>";
                // 顯示修改時間，如果沒有則顯示 "-"
                echo "<td style='text-align: center; vertical-align:middle;'>" . 
                    (empty($row_result['modify_time']) ? "-" : $row_result['modify_time']) . "</td>";
                
                if ($row_result['topnews'] == "YES"){
                    echo '<td><input type="checkbox" checked onchange="updateCheckboxValue(this, '.$row_result['id'].')"></td>';
                }
                else{
                    echo '<td><input type="checkbox" onchange="updateCheckboxValue(this, '.$row_result['id'].')"></td>';
                }
                
                echo "<td><a href='manager_news_update.php?id=".$row_result['id']."'>修改 </a>";
                echo "<a href='manager_news_delete.php?id=".$row_result['id']."'>刪除</a></td>";
                echo "</tr>";
            }
        ?>

        </table>
        <button class="btn_add" onclick="window.location.href='manager_news_create.php'">新增資料</a>
    </body>
</html>