<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   while ($row=mysqli_fetch_array($result)) {
     # 輸出每一筆資料的 'id' 和 'pwd' 欄位，並換行 
     echo $row["id"]." ".$row["pwd"]."<br>";
   } 
?>
