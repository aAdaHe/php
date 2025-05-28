<?php

    error_reporting(0);  // 關閉所有錯誤訊息顯示，避免警告或錯誤訊息干擾畫面
    session_start();  // 啟動 session，使用 $_SESSION 來管理使用者登入狀態
    
    // 判斷是否有登入（判斷 $_SESSION['id'] 是否存在）
    if (!$_SESSION["id"]) {
        // 如果沒登入，顯示訊息
        echo "請登入帳號";
        // 並在3秒後自動跳轉回登入頁面 2.login.html
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 使用 mysqli_connect 連接資料庫，主機、使用者名稱、密碼、資料庫名稱
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 執行 SQL UPDATE 指令，將 POST 傳來的資料更新到 bulletin 表中指定的 bid（公告編號）
        // title、content、time、type 欄位依序更新
        // 若執行失敗進入 if 區塊
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            echo "修改錯誤";  // 顯示修改錯誤訊息
            // 並在3秒後跳轉回公告列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            // 若執行成功，顯示修改成功訊息
            echo "修改成功，三秒鐘後回到佈告欄列表";
            // 並在3秒後跳轉回公告列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
