<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0);  // 關閉錯誤回報
        session_start();  // 開啟session

        // 檢查是否有登入（判斷 session 中是否存在 id）
        if (!$_SESSION["id"]) {
            echo "請登入帳號";   // 若未登入，提示用戶登入
            
            // 3 秒後導向登入頁面
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
            // 若已登入，顯示使用者管理頁面
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";  // 表格的標題列
            
            // 建立與資料庫的連線（使用 db4free.net 的帳號密碼和資料庫名稱）
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            // 從 user 資料表查詢所有使用者資料
            $result=mysqli_query($conn, "select * from user");
            // 用迴圈將每一筆資料列出來
            while ($row=mysqli_fetch_array($result)){
                // 每一列資料顯示：修改與刪除連結、帳號、密碼
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
             // 結束
            echo "</table>";
        }
    ?> 
    </body>
</html>
