<?php

    error_reporting(0);   // 關閉錯誤訊息顯示
    session_start();  // 開啟session

    // 檢查使用者是否登入（判斷 session 是否有 id）
    if (!$_SESSION["id"]) {
        echo "請登入帳號";  // 如果沒登入，提示使用者登入
        // 3秒後自動跳轉到登入頁面（2.login.html）
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{  
        // 建立連線到遠端資料庫（db4free.net）
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 把指定使用者的密碼改成從表單送過來的密碼
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            // 若 SQL 執行失敗，顯示錯誤訊息並在 3 秒後回到使用者管理頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            // 若更新成功，顯示成功訊息並在 3 秒後回到使用者管理頁面
            echo "修改成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
