<?php 
    # 檢查提交的 'id' 和 'pwd' 是否與預設的值匹配
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234"))
        # 如果帳號為 "john" 且密碼為 "john1234"，登入成功
        echo "登入成功";
    else
        # 否則，登入失敗
        echo "登入失敗";  
?>
