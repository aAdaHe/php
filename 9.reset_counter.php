<?php
    # 啟動會話，可以讀取和修改 session 資料
    session_start();
    # 移除 session 中的 "counter" 變數，這樣就重置了計數器
    unset($_SESSION["counter"]);
    # 顯示訊息，告訴使用者計數器已成功重置
    echo "counter重置成功....";
    # 使用 <meta> 標籤使用這裡，等 2 秒後自動重定向回 8.counter.php 頁面
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";

?>
