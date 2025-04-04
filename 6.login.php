<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
      # 檢查輸入的帳號和密碼是否與資料庫中的資料匹配
      # 如果匹配，將 $login 設為 TRUE
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   # 判斷 $login 是否為 TRUE
   if ($login==TRUE)
     echo "登入成功";  # 如果登入成功，顯示「登入成功」
  else
     echo "帳號/密碼 錯誤";  # 如果登入失敗，顯示「帳號/密碼 錯誤」
?>
