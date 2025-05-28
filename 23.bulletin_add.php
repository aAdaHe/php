<?php
    error_reporting(0);  // 關閉錯誤報告，不顯示錯誤訊息
    session_start();  // 開啟

    // 判斷 session 中是否有 'id'，確認使用者是否已登入
    if (!$_SESSION["id"]) {
        
        // 如果沒登入，顯示訊息
        echo "please login first";
        // 3秒後自動跳轉到登入頁面 2.login.html
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 建立資料庫連線，連接到 db4free.net 主機上的 immust 資料庫
        // 使用者名稱: immust，密碼: immustimmust
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 建立資料庫連線，連接到 db4free.net 主機上的 immust 資料庫
        // 使用者名稱: immust，密碼: immustimmust
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        
         // 執行 SQL 指令，判斷是否成功
        if (!mysqli_query($conn, $sql)){
             // 失敗，顯示訊息
            echo "新增命令錯誤";
        }
        else{
            // 成功，顯示訊息
            echo "新增佈告成功，三秒鐘後回到網頁";
            // 3秒後自動跳轉回公告列表頁面 11.bulletin.php
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
