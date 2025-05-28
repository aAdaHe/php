<?php

error_reporting(0);  // 關閉錯誤報告
session_start();  // 開啟 session 功能

// 檢查是否有登入（session 中是否有 "id"）
if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   
   // 準備 SQL 指令：將表單傳入的 id 與 pwd 加入 user 資料表
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   
   #echo $sql;

   // 執行 SQL 指令，並檢查是否成功
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤";   // 執行失敗顯示錯誤訊息
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁";  // 成功訊息
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";    // 3 秒後跳轉回使用者管理頁面
    }
   }
}
?>
