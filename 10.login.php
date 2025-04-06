<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;  # 預設登入狀態為 FALSE，表示尚未登入
   while ($row=mysqli_fetch_array($result)) {
     # 提交的帳號（POST["id"]）和密碼（POST["pwd"]）是否與資料庫中的資料相符
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;  #  // 若匹配，設定登入狀態為 TRUE
     }
   } 
   #  如果登入成功，則開始 session 並顯示登入成功訊息
   if ($login==TRUE) {
    session_start();  # 啟動 session
    $_SESSION["id"]=$_POST["id"];  # 將使用者的 id 存入 session 變數中，方便後續使用
    echo "登入成功";  # 顯示登入成功訊息
    # 使用 <meta> 標籤  設置 3 秒後自動跳轉到 11.bulletin.php 頁面
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
    # 如果登入失敗，顯示錯誤訊息並自動跳轉回登入頁面
    echo "帳號/密碼 錯誤";
    # 使用 <meta> 標籤  設置 3 秒後自動跳轉回登入頁面 2.login.html
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
