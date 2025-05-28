<?php
    error_reporting(0);  // 關閉錯誤訊息顯示，避免錯誤干擾使用者介面
    session_start();  // 啟用 session，使用 $_SESSION 來判斷使用者是否登入
    
    // 檢查 session 是否有 'id'，判斷使用者登入狀態
    if (!$_SESSION["id"]) {
        // 若未登入，顯示提示訊息
        echo "請登入帳號";

        // 並在3秒後自動跳轉至登入頁面 2.login.html
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 已登入，連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 組合 SQL 指令，根據 GET 參數中的 bid 刪除公告資料
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        
        // 若需要，開啟下面這行可印出 SQL 指令，方便除錯
        #echo $sql;
        
        // 執行 SQL 刪除指令，判斷是否成功
        if (!mysqli_query($conn,$sql)){
            // 刪除失敗，顯示訊息
            echo "佈告刪除錯誤";
        }else{
            // 刪除成功，顯示訊息
            echo "佈告刪除成功";
        }
        // 3秒後自動跳轉回公告列表頁面 11.bulletin.php
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
