<?php
    
    include("connect.php");

    $sql_query = "SELECT * FROM member_table ORDER BY id ASC";
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
        <title>後臺管理系統 | 帳號管理</title>
        <style type="text/css">
            .up_div h1{  
                align:"left";
                margin-left:12%;
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
                background-color:#D3CBF0;
                color:white; 
                font-weight:600;  
                width:125px;        
                height:40px;
                border:1.5px solid  #D3CBF0;
                position: absolute;
                right: 0;
                margin-right:11.7%;
                margin-top:1%;
            }
            .line{ /*長條*/
                background-color:#D3CBF0; 
                width:77.7%; 
                height:10%; 
                margin-left:11.2%; 
                margin-top:-1%; 
                color:#D3CBF0;
            }

            @media (max-width: 1000px){ /*螢幕最大寬度介於470-750px的時候*/
                .up_div h1{ 
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
                    background-color:#D3CBF0; 
                    color:white; 
                    font-weight:600;  
                    width:100px;        
                    height:40px;
                    border:1.5px solid  #D3CBF0;
                    position: absolute;
                    right: 0;
                    margin-right:12%;
                    margin-top:5%;
                }
                .line{ /*長條*/
                    background-color:#D3CBF0; 
                    width:77.7%; 
                    height:10%; 
                    margin-left:11.2%; 
                    margin-top:-1%; 
                    margin-bottom:5%; 
                    color:#D3CBF0;
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
                    background-color:#D3CBF0; 
                    color:white; 
                    font-weight:600;  
                    width:20%;        
                    height:40px;
                    border:1.5px solid  #D3CBF0;
                    position: absolute;
                    right: 0;
                    margin-right:13%;
                    margin-top:5%;
                }
                .line{ /*長條*/
                    background-color:#D3CBF0; 
                    width:77.7%; 
                    height:10%; 
                    margin-left:11.2%; 
                    margin-top:-1%; 
                    margin-bottom:5%; 
                    color:#D3CBF0;
                }
            }
        </style>
    </head>
    <body style="background-color:#F9FFFF; font-family: Microsoft JhengHei;">
        <div id="back">
            <a style= "font-family:微軟正黑體;color:#7B7B7B; text-decoration:none; font-weight: 600;" id="back" href="homepage_manager.php">返回 Back</a>
        </div>
        <div class="up_div">
            <h1 style="display: inline-block;">後台帳號管理</h1>
        </div>
            <p style="text-align:right; margin-right:12.5%; margin-top:-2.5%;">目前帳號數量：<?php echo $total_records;?></p>
        
        
            <div class="line">11</div>
            <table border="1" align="center" class="table" cellpadding="5">
                <tr>
                    <th>權限</th>
                    <th>姓名</th>
                    <th>帳號</th>
                    <th>信箱</th>
                    <th>操作</th>
                </tr>
            <?php
                while($row_result = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='text-align: center; vertical-align:middle;'>" . $row_result['permission'] . "</td>";
                    echo "<td style='text-align: center; vertical-align:middle;'>" . $row_result['user'] . "</td>";
                    echo "<td style='text-align: center; vertical-align:middle;'>" . $row_result['username'] . "</td>";
                    echo "<td style='text-align: center; vertical-align:middle;'>" . $row_result['email'] . "</td>";
                    echo "<td style='text-align: center; vertical-align:middle;'>";
                    echo "<a href='manager_member_update.php?id=" . $row_result['id'] . "'>修改 </a>";
                    echo "<a href='manager_member_delete.php?id=" . $row_result['id'] . "' onclick=\"return confirm('確定要刪除帳號：" . $row_result['username'] . " 嗎？')\">刪除</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            </table>

        <button class="btn_add" onclick="window.location.href='manager_member_create.php'">新增帳號</a>
    </body>
</html>