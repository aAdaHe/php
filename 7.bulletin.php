<?php
    # 取消所有錯誤報告
    error_reporting(0);
    #  連接到 mysqli_connect
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    # 執行 SQL 查詢，SELECT 查詢語句，`*` 表示選取所有欄位的資料
    $result=mysqli_query($conn, "select * from bulletin");
    # 表格標題，表格邊框設為 2，顯示欄位名稱
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>";
        echo $row["bid"];  # 顯示佈告編號
        echo "</td><td>";
        echo $row["type"];  # 顯示佈告類別
        echo "</td><td>"; 
        echo $row["title"];  #顯示標題
        echo "</td><td>";
        echo $row["content"];   # 顯示佈告內容
        echo "</td><td>";
        echo $row["time"];  # 顯示發佈時間
        echo "</td></tr>";
    }
    # // 關閉表格標籤
    echo "</table>"
?>
