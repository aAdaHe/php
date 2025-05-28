<?php
    error_reporting(0);  // 關閉所有錯誤訊息顯示，避免出現警告或錯誤資訊
    session_start();  // 啟動 session，讓程式可以使用 $_SESSION 變數追蹤使用者狀態
    
    // 判斷 session 中是否有 'id' 變數（是否登入）
    if (!$_SESSION["id"]) {
        // 若未登入，顯示請先登入的訊息
        echo "please login first";
        // 並在3秒後自動跳轉回登入頁面 (2.login.html)
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        
        // 已登入者，開始連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 從 GET 參數中取得公告編號 bid，查詢該公告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        // 取出查詢結果的資料列，放入 $row 陣列
        $row=mysqli_fetch_array($result);
        // 初始化三個變數用於設定 radio 按鈕是否被勾選（checked）
        $checked1="";
        $checked2="";
        $checked3="";

        // 根據公告類型欄位，設定對應的 radio 按鈕為 checked
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";

        // 使用 echo 輸出 HTML 表單，表單中帶入公告原本的資料
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
