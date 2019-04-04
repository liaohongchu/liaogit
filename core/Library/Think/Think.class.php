<?php


namespace Think;
/**
 * 引导类,Think.class.php简化版
 */
class Think {

  static public function start() {
    //echo 'app start<br/>';
    self::init();
  }

  public static function init()
  {
    spl_autoload_register('Think\Think::autoload');
  }

  public static function autoload($class='')
  {

    $name           =   strstr($class, '\\', true);
    //echo "name==".$name."<br>";  //name==Think
    

    //echo str_replace('\\', '/', $class);

    if( in_array($name,array('Think')) ){
      $path=$_SERVER["DOCUMENT_ROOT"]."/core/Library/";
    }

    $loaction=$path."/".$class.".class.php";
    if(is_file($loaction)){

      require_once($loaction); 
    }else{
      echo $class." not class"; exit;
    }
    
  }

  /**
     * 添加和获取页面Trace记录
     * @param string $value 变量
     * @param string $label 标签
     * @param string $level 日志级别(或者页面Trace的选项卡)
     * @param boolean $record 是否记录日志
     * @return void|array
     */
    static public function trace($value='[think]',$label='',$level='DEBUG',$record=false) {
        static $_trace =  array();
        if('[think]' === $value){ // 获取trace信息
            return $_trace;
        }else{
            $info   =   ($label?$label.':':'').print_r($value,true);
            $level  =   strtoupper($level);
            
            if((defined('IS_AJAX') && IS_AJAX) || !C('SHOW_PAGE_TRACE')  || $record) {
              print_r ($info);
                //Log::record($info,$level,$record);  //  暂时没加上日志文件 记录
            }else{
                if(!isset($_trace[$level]) || count($_trace[$level])>C('TRACE_MAX_RECORD')) {
                    $_trace[$level] =   array();
                }
                $_trace[$level][]   =   $info;
            }
        }
    }

    
}
