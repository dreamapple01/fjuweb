<?php session_start(); ?>
        <!--上方語法為啟用session，此語法要放在網頁最前方-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        //連接資料庫
        //只要此頁面上有用到連接MySQL就要include它
        include("connect.php");
        // $slcdb=mysqli_select_db($db_link,"fjuweb");
        $username = $_POST['username1'];
        $password = $_POST['password1'];
        //搜尋資料庫資料
        // $sql = "SELECT * FROM member_table where username = '$username'";

        // 使用參數化查詢
        $sql = "SELECT * FROM member_table WHERE username = ?";
        $stmt = $mysqli->prepare($sql);

        // 綁定參數
        $stmt->bind_param("s", $username);

        // 執行查詢
        $stmt->execute();

        // 取得查詢結果
        $result = $stmt->get_result();

        // 處理結果
        $row = $result->fetch_assoc();

        // $result=mysqli_query($db_link, $sql);
        // $row = @mysqli_fetch_row($result);
        // echo $row;
        // print_r($row);

        //如果欄位為空值
        if ($username == null || $password == null) {
                echo "<script>alert('欄位不得為空值，請再檢查!')</script>";
                echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
        }
        //如果欄位不為空值
        else{
                //如果沒有這個會員
                // print_r($row);
                if($row['username'] != $username){
                        echo "<script>alert('尚未有此帳號 請註冊!')</script>";
                        echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
                }
                //有這個會員
                else{   
                        //如果密碼錯誤
                        if ($row['username'] == $username && !password_verify($password, $row['password'])) {
                                echo "<script>alert('密碼錯誤!請重新登入!')</script>";
                                echo '<meta http-equiv=REFRESH CONTENT=0;url=../register.html>';
                            }
                            
                        //密碼正確
                        else{
                                // echo "<script>alert('管理者登入成功!')</script>";  
                                $_SESSION['member_id'] = $row['id'];
                                $_SESSION['user'] = $row['user'];
                                $_SESSION['user_id'] = $row['user_id'];
                                echo '<meta http-equiv=REFRESH CONTENT=0;url=homepage_manager.php>';
                        }                                               
                }
        }


        // 關閉查詢和連線
        $stmt->close();
        $mysqli->close();
?>