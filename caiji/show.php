<?php
/**
 * 远程登录 POST
 */
$loginurl='http://www.xinqq163.com/dcms/index.php';

$cookie='menuitems=1_1%2C2_1%2C3_1; Hm_lvt_27b119ebab1eedc3d620f6464f449194=1558867848,1559036738,1559119684,1559183833; CNZZDATA1226946=cnzz_eid%3D767587424-1532359606-http%253A%252F%252Fxinqq163.com%252F%26ntime%3D1559119649; pgv_pvid=3923998769; __guid=76212883.2447931162711976000.1534300592402.416; CNZZDATA1275169666=1933504557-1545384650-null%7C1545400850; UM_distinctid=1686916bd13280-03f73608ff1a2c8-143a7740-100200-1686916bd141a3; CNZZDATA1277354711=1317788335-1557626542-null%7C1557631942; PHPSESSID=k5f1v3dvofbkeke4iek61tt9q6';
$cookie='menuitems=1_1%2C2_1%2C3_1; pgv_pvid=4058718408; Hm_lvt_27b119ebab1eedc3d620f6464f449194=1532837909; UM_distinctid=16b162d163a309-0f96efb9fa94f4-464a0329-100200-16b162d163b104; DedeUserID=1; DedeUserID__ckMd5=0cb44d2ce51265be; DedeLoginTime=1559466748; DedeLoginTime__ckMd5=1e9ab0f00523a700; PHPSESSID=hkbb6hfmhebnfppm5frobrf132';

//$cookie=file_get_contents(dirname(__FILE__).'/cookie2.txt');


//初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $loginurl);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的get请求
    curl_setopt($curl,CURLOPT_PROXY,'127.0.0.1:8888');//设置代理服务器 

    curl_setopt($curl, CURLOPT_COOKIE, $cookie); 
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);

    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    print_r($data);