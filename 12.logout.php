<?php
    # 啟動 Session，這樣我們可以管理和使用 Session 變數
    session_start();
    # 清除 Session 中的 "id" 變數，通常這用於登出用戶
    unset($_SESSION["id"]);
    # 顯示登出成功的訊息
    echo "登出成功....";
    # 使用 meta 標籤進行自動重定向，3 秒後跳轉到 2.login.html 頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
