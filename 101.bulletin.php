<?php
    # 關閉錯誤報告
    error_reporting(0);
    # 啟動，可以讀取 session 資料
    session_start();
    # 使用者是否已經登入
    if (!$_SESSION["id"]) {
       #  如果 session 中的 "id" 沒有設定，表示使用者尚未登入
        echo "請先登入";  # 顯示訊息
        # 使用 <meta> 標籤  設置 3 秒後自動跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
       # 如果使用者已經登入，顯示歡迎訊息
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        # 連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        # 從 "bulletin" 資料表中查詢所有資料
        $result=mysqli_query($conn, "select * from bulletin");
        # 顯示查詢結果的表格
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        # 查詢結果中的每一筆資料
        while ($row=mysqli_fetch_array($result)){
            # 為每一筆資料顯示修改和刪除連結
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            # 顯示佈告的資料
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        # 結束表格標籤
        echo "</table>";
    
    }

?>
