
<?php
    
    session_start();
    

    include("connect.php");
    // 如果session裡沒有儲存member_id，重新導向至登入頁面
    if (!isset($_SESSION['member_id'])) {
        header("Location: ../register.html");
        exit;
    }
    
    // 修改 SQL 查詢來正確關聯修改者的資訊
    $sql_query = "SELECT h.*, m.user AS modifier_name 
              FROM history_english h 
              LEFT JOIN member_table m ON h.modifier_id = m.id 
              ORDER BY h.id ASC";
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
        <title>後臺管理系統 | 輔仁大事記-英</title>
        <style type="text/css">
            .up_div h1{  /*輔仁大事記資料管理*/
                align:"left";
                margin-left:12%;
            }
            .table{
                margin-top:2%;
                /*邊框合併*/
                border-collapse:collapse;
                border:1.5px solid  #C7CDCD;
                width: 85%;
            }
            .table a{ /*修改 刪除*/
                text-decoration:none;
                color: #7F82BB;
            }
            .btn_add{
                text-decoration:none; 
                background-color:#B3C5ED; 
                color:white; 
                font-weight:600;  
                width:125px;        
                height:40px;
                border:1.5px solid  #B3C5ED;
                position: absolute;
                right: 0;
                margin-right:11.7%;
                margin-top:1%;
            }
            .line{ /*長條*/
                background-color:#B3C5ED; 
                width:85%; 
                height:10%; 
                margin-left:7.5%; 
                margin-top:-1%; 
                color:#B3C5ED;
            }

            @media (max-width: 1000px){ /*螢幕最大寬度介於470-750px的時候*/
                .up_div h1{  /*輔仁大事記資料管理標題*/
                    align:"left";
                    margin-left:12%;
                    font-size: 200%;
                }
                .table{
                    margin-top:2%;
                    /*邊框合併*/
                    border-collapse:collapse;
                    border:1.5px solid  #C7CDCD;
                    width: 77.7%;
                }
                .table a{ /*修改 刪除*/
                    text-decoration:none;
                    color: #7F82BB;
                }
                .btn_add{
                    text-decoration:none; 
                    background-color:#B3C5ED; 
                    color:white; 
                    font-weight:600;  
                    width:100px;        
                    height:40px;
                    border:1.5px solid  #B3C5ED;
                    position: absolute;
                    right: 0;
                    margin-right:12%;
                    margin-top:5%;
                }
                .line{ /*長條*/
                    background-color:#B3C5ED; 
                    width:77.7%; 
                    height:10%; 
                    margin-left:11.2%; 
                    margin-top:-1%; 
                    margin-bottom:5%; 
                    color:#B3C5ED;
                }
            }

            @media (max-width: 470px){ /*螢幕最大寬度小於470px的時候*/
                .up_div h1{  /*輔仁大事記資料管理標題*/
                    align:"left";
                    margin-left:12%;
                    font-size: 175%;
                }
                .table{
                    margin-top:2%;
                    /*邊框合併*/
                    border-collapse:collapse;
                    border:1.5px solid  #C7CDCD;
                    width: 77.7%;
                }
                .table a{ /*修改 刪除*/
                    text-decoration:none;
                    color: #7F82BB;
                }
                .btn_add{
                    text-decoration:none; 
                    background-color:#B3C5ED; 
                    color:white; 
                    font-weight:600;  
                    width:20%;        
                    height:40px;
                    border:1.5px solid  #B3C5ED;
                    position: absolute;
                    right: 0;
                    margin-right:13%;
                    margin-top:5%;
                }
                .line{ /*長條*/
                    background-color:#B3C5ED; 
                    width:77.7%; 
                    height:10%; 
                    margin-left:11.2%; 
                    margin-top:-1%; 
                    margin-bottom:5%; 
                    color:#B3C5ED;
                }
            }
        </style>
    </head>
    <body style="background-color:#F9FFFF; font-family: Microsoft JhengHei;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="../homepage_manager.html">返回 Back</a>
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600; float: right;" id="back" href="manager_historyWeb.php">Chinese</a>
        </div>
        <div class="up_div">
            <h1 style="display: inline-block;">Fu Jen Memorabilia Management</h1>
        </div>
            <p style="text-align:right; margin-right:12.5%; margin-top:-2.5%;">Number of records：<?php echo $total_records;?></p>
        
        
        <div class="line">11</div>
        <table border="1" align = "center" class="table" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Event</th>
                <th>EDITOR</th>
                <th>EDIT TIME</th>
                <th>編輯</th>
            </tr>
        <?php
            while($row_result = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='text-align: center; vertical-align:middle;'>".$row_result['id']."</td>";
                
                echo "<td style='text-align: center; vertical-align:middle;'>".$row_result['year']."</td>";
                echo "<td>".$row_result['event']."</td>";
                // 只在有修改時間時顯示修改者，否則顯示 "-"
                if (!empty($row_result['modify_time'])) {
                    echo "<td style='text-align: center; vertical-align:middle;'>" . 
                        (empty($row_result['modifier_name']) ? "-" : $row_result['modifier_name']) . "</td>";
                } else {
                    echo "<td style='text-align: center; vertical-align:middle;'>-</td>";
                }
                echo "<td style='text-align: center; vertical-align:middle;'>" . 
                    (empty($row_result['modify_time']) ? "-" : $row_result['modify_time']) . "</td>";
                
                echo "<td><a href='manager_history_update_English.php?id=".$row_result['id']."'>修改 </a>";
                echo "<a href='manager_history_delete_English.php?id=".$row_result['id']."'>刪除</a></td>";
                echo "</tr>";
            }
        ?>
        </table>
        <button class="btn_add" onclick="window.location.href='manager_history_create_English.php'">新增資料</a>
    </body>
</html>