<?php
/**
 * 远程登录 POST
 */

// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
// header("Cache-Control: no-cache, must-revalidate");
// header("Pragma: no-cache");

$loginurl='http://www.xinqq163.com/dcms/login.php?gotopage=http%3a%2f%2fwww.xinqq163.com%2fdcms%2findex.php';
$dopost='login';
$adminstyle='newdedecms';

$headers = array(
	'Host: www.xinqq163.com',
	'Connection: keep-alive',
     'Cache-Control: max-age=0',
     'Upgrade-Insecure-Requests: 1',
     'Content-Type: application/x-www-form-urlencoded',
     'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',
     'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
     'Accept-Encoding: gzip, deflate',
     'Accept-Language: zh-CN,zh;q=0.8',
     'Cookie: menuitems=1_1%2C2_1%2C3_1; pgv_pvid=4058718408; Hm_lvt_27b119ebab1eedc3d620f6464f449194=1532837909',
     'User-Agents: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.48 Safari/537.36',
	);

$keyword    = 'PHP cURL';
//参数方法一
// $post       = 'wd=' . urlencode($keyword);
//参数方法二
$post       = array(
    'userid'        => 'liaohongchu',
    'pwd' =>'123',
    'validate' =>123,
    'dopost'=>$dopost,
    'adminstyle'=>$adminstyle,
    'gotopage'=>'http://www.xinqq163.com/ndex.php'
);
//print_r ($post); exit;
$url        = $loginurl;
$ch  = curl_init($url);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_PROXY,'127.0.0.1:8888');//设置代理服务器
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //返回数据不直接输出
curl_setopt($ch, CURLOPT_POST, 1);            //发送POST类型数据
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);  //POST数据，$post可以是数组，也可以是拼接
$content = curl_exec($ch);                    //执行并存储结果
curl_close($ch);
var_dump($content); //exit;
file_put_contents('./cookie.txt', $content);
$preg_cookie = '/Set-Cookie: (.*?);/m';
if(preg_match_all($preg_cookie,$content,$cookie)){
    $cookie = implode('; ', $cookie['1']);
}
//echo $cookie;
file_put_contents('./cookie2.txt', $cookie);
$cookie_1 = dirname(__FILE__).'/cookie2.txt';
$cookie_jar = file_get_contents($cookie_1); //exit;

print_r($cookie); exit;

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

    curl_setopt($ch2,CURLOPT_PROXY,'127.0.0.1:8888');//设置代理服务器
    curl_setopt($ch2, CURLOPT_COOKIE, $cookie_jar);

    //curl_setopt($ch2,CURLOPT_COOKIEFILE,$cookie_jar);//发送cookie文件
    //curl_setopt($ch2, CURLOPT_COOKIEJAR, $cookie_jar);  //保存cookie信息

    
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面,1是自动跳转
    //curl_setopt($ch, CURLOPT_NOBODY,1); //输出的不包含body部分
    
    $output = curl_exec($ch2);
    file_put_contents('auto.txt', $output);
    curl_close($ch2);
    
    
    unlink($cookie_1);
