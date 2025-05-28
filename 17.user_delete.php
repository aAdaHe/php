<?php
    error_reporting(0);  // 關閉錯誤報告
    session_start();  // 啟用session 

    // 檢查是否登入（session 中是否有 "id"）
    if (!$_SESSION["id"]) {
        echo "請登入帳號";  // 顯示
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";  // 3 秒後跳轉到登入頁面
    }
    else{   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // SQL 刪除語句：根據 GET 傳入的 id 來刪除對應的使用者
        $sql="delete from user where id='{$_GET["id"]}'";
        
        #echo $sql;  // 除錯用：顯示 SQL 語句

        // 執行 SQL，並顯示是否成功
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";   // 刪除失敗
        }else{
            echo "使用者刪除成功";  // 刪除成功
        }

        // 3 秒後自動跳轉回使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
