<?php
   # mysqli_connect() 建立與 MySQL 資料庫的連線
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   # mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   # mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;  # 初始設定登入狀態為假
   
   # 逐筆檢查資料庫中的使用者資料是否與輸入的帳號密碼匹配
   while ($row=mysqli_fetch_array($result)) {
   # 如果帳號與密碼匹配，則設定登入成功
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   # 判斷登入是否成功
   if ($login==TRUE) {
     session_start();  # 啟動會話，開始使用 Session 功能
     $_SESSION["id"]=$_POST["id"];  # 儲存用戶 ID 於 session 中
     echo "登入成功";   # 顯示登入成功訊息
     # 重定向到下一頁，並延遲 3 秒後自動跳轉
     echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
     # 如果帳號或密碼錯誤，顯示錯誤訊息
     echo "帳號/密碼 錯誤";
     # 延遲 3 秒後重新導向回登入頁面
     echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
