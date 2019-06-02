<?php 
    header("Content-type: text/html; charset=utf-8");
    !extension_loaded('curl') && die('The curl extension is not loaded.');
    $cookie_jar = @tempnam('./cookies','cookie');//存放COOKIE的文件
    $cookie_jar = dirname(__FILE__).'/cookie_yz.txt';
    //$cookie_jar = dirname(__FILE__).'/cookie2.txt';
    echo $cookie_jar; //exit;

    //echo file_get_contents($cookie_jar);

    //登陆认证
    $url = 'http://www.xinqq163.cn.php';
    $gotopage='http://www.xinqq163.coex.php';
    

    //本来封装了函数，后来一直不成功，于是还原成了最原始的代码积木
    
    $post_data='gotopage='.$gotopage.'&dopost=login&adminstyle=newdedecms&userid=li3';    
   
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_HEADER, 1);      
    curl_setopt($ch, CURLOPT_POST, 1);     //设置post方式    
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 ); // 1相当于return，0相当于echo    
    
    curl_setopt($ch,CURLOPT_COOKIESESSION,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); //设置需要post的数据    
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);  //保存cookie信息    
    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面,1是自动跳转        
    //curl_setopt($ch, CURLOPT_NOBODY,1); //输出的不包含body部分    
    
    $output1 = curl_exec($ch);    
    
    //写入结果到文件
    file_put_contents('login.txt', $output1);
    
    curl_close($ch);
    
    exit;
    
    
    //这里本来封装了函数，后来一直不成功，于是还原成了最原始的代码积木
    
    $url2 = "http://www.xinqq163.com/dcms/index.php";
    $ch2 = curl_init();
    
    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2, CURLOPT_HEADER, 0);  
    
    curl_setopt ( $ch2, CURLOPT_RETURNTRANSFER, 1 ); // 1相当于return，0相当于echo
    curl_setopt($ch2, CURLOPT_BINARYTRANSFER, true);   
    
    curl_setopt($ch2, CURLOPT_TIMEOUT, 30);    //超时时间30s    
    curl_setopt($ch2,CURLOPT_COOKIESESSION,true);
    curl_setopt($ch2, CURLOPT_HTTPGET, 1); // 发送一个常规的get请求
    curl_setopt($ch2, CURLOPT_AUTOREFERER, 1); // 自动设置Referer   

    //curl_setopt($ch2, CURLOPT_COOKIE, $cookie_jar);

    curl_setopt($ch2,CURLOPT_COOKIEFILE,$cookie_jar);//发送cookie文件
    curl_setopt($ch2, CURLOPT_COOKIEJAR, $cookie_jar);  //保存cookie信息

    
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面,1是自动跳转
    //curl_setopt($ch, CURLOPT_NOBODY,1); //输出的不包含body部分
    
    $output = curl_exec($ch2);
    file_put_contents('index.txt', $output);
    curl_close($ch2);
    
    
    unlink($cookie_jar);
?>
