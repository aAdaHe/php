<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0);   // 關閉錯誤報告（不建議用於開發環境，可能會忽略重要錯誤）
    session_start();  // 啟動 session 功能，用來存取使用者的登入資訊

    // 檢查使用者是否已登入（即 session 中是否有 id）
    if (!$_SESSION["id"]) {
         // 若未登入，顯示提示訊息, 3 秒後導向登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        // 若已登入，顯示新增使用者的表單
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
