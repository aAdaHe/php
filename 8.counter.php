<?php
    # 啟動會話（Session），這樣可以讓我們使用 session 來儲存和取得資料
    session_start();
    # 檢查 session 中是否已經有 "counter" 變數，用來儲存訪問次數
    if (!isset($_SESSION["counter"]))
        # 如果 session 中沒有 "counter" 變數，表示是第一次訪問，將 "counter" 設為 1
        $_SESSION["counter"]=1;
    else
        # 如果 session 中有 "counter" 變數，表示不是第一次訪問，將 "counter" 值加 1
        $_SESSION["counter"]++;

    # 顯示訪問計數器的當前值
    echo "counter=".$_SESSION["counter"];
    # 顯示一個連結，會導向 9.reset_counter.php 頁面，這個頁面會執行重置計數器的操作
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
