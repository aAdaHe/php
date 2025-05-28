<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);  // 關閉錯誤訊息
    session_start();  // 開啟 session

    // 檢查是否登入，若未登入則提示並跳轉至登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 建立資料庫連線（使用遠端 MySQL 資料庫）
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 根據網址參數取得對應使用者資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        // 取得查詢結果中的資料列
        $row=mysqli_fetch_array($result);
        // 顯示修改表單（帳號不可修改，密碼可修改）
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
