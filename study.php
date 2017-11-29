<?php

header("Content-type: text/html; charset=utf-8");
// $age=array('peter'=>35,'bottor'=>20,'hally'=>28);
// foreach($age as $key=>$value){
//     echo "key=".$key.",value=".$value;
//     echo '<br>';
// }
// $cars=array('bmw','halli','benci','yma');
// sort($cars);
// print_r($cars);
// asort($age);
// print_r($age);
// $x=25;
// $y=75;
// function addition(){
//     $GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];

// }
// addition();
// echo $GLOBALS['z'];
// $i=1;
// do{
//     $i++;
//     echo 'the number is '.$i.'<br>';

// }
// while($i<5);
// for ($i=1; $i<=5; $i++)
// {
//  echo "The number is " . $i . "<br>";
// }
// $x=array('one','two','three');
// foreach($x as $i=>$value){
//     echo $i,$value;
//     echo '<br>';
// }
// function writeName(){
//     return 'mengmengda';
// }
// echo 'my name is <br>';

// echo writeName();
// echo '这个文件位于 '.__DIR__.'的位置';
// function test() {
//     echo  '函数名为：' . __FUNCTION__ ;
//     }
//     test();
// class test{
//     function _print(){
//         echo '类名为'.__CLASS__.'<br>';
//         echo '函数名为'.__FUNCTION__.'<br>';
//     }
// }
// $t=new test();
// $t->_print();
// class Base{
//     public function sayHello()
//     {
//        echo 'hello';
//     }
// }

// trait sayWorld{
//     public function sayHello()
//     {
//         parent::sayHello();
//         echo 'world';
//     }
// }
// class MyHelloWorld extends Base{
//     use sayWorld;
// }
// $o=new MyHelloWorld();
// $o->sayHello();

// echo '命名空间为：'.__NAMESPACE__;
// class Site{
//     var $url;
//     var $title;
//     function __construct($par1,$par2){
//         $this->url=$par1;
//         $this->title=$par2;
//     }
//     function setUrl($par){
//         $this->url=$par;
//     }
//     function getUrl(){
//         echo $this->url .'<br>';
//     }
//     function setTitle($par){
//         $this->title=$par;
//     }
//     function getTitle(){
//         echo $this->title .'<br>';
//     }
// }
// $php = new Site('www.php.cn', 'php中文网');
// $taobao = new Site('www.taobao.com', '淘宝');
// $google = new Site('www.google.com', 'Google 搜索');
// $php->getTitle();
// $taobao->getTitle();
// $google->getTitle();

// $php->getUrl();
// $taobao->getUrl();
// $google->getUrl();
// class MyDestructableClass{
//     function __construct(){
//         print "构造函数\n";
//         $this->name='MyDestructableClass';
//     }
//     function __destruct(){
//         print "销毁" .$this->name ."\n";
//     }
// }
// $obj=new MyDestructableClass();
// $obj;
// class Child extends Site{
//     var $category;
//     function setCate($par){
//         $this->category=$par;
//     }
//     function getCate(){
//         echo $this->category ."<br>";
//     }
// }
// $child=new Child('继承','1111');
// $child->getTitle();
// $child->getUrl();
// class MyClass{
//     public $public='Public';
//     private $private='Private';
//     protected $protected='Protected';
//     function printHello(){
//         echo $this->public ."<br>";
//         echo $this->private ."<br>";
//         echo $this->protected ."<br>";
//     }
// }
// $obj=new MyClass();
// echo $obj->public;
// // echo $obj->protected;
// // echo $obj->private;
// $obj->printHello();
// class BaseClass {
//     function __construct() {
//         print "BaseClass 类中构造方法" . '<br>';
//     }
//  }
//  class SubClass extends BaseClass {
//     function __construct() {
//         parent::__construct();  // 子类构造方法不能自动调用父类的构造方法
//         print "SubClass 类中构造方法" . '<br>';
//     }
//  }
//  class OtherSubClass extends BaseClass {
//      // 继承 BaseClass 的构造方法
//  }

//  // 调用 BaseClass 构造方法
//  $obj = new BaseClass();

//  // 调用 BaseClass、SubClass 构造方法
//  $obj = new SubClass();

//  // 调用 BaseClass 构造方法
//  $obj = new OtherSubClass();
// $file = fopen("index.html", "r") or exit("无法打开文件!");
// // 读取文件每一行，直到文件结尾
// while(!feof($file))
//  {
//     echo fgets($file). "<br>";
//  }
// fclose($file);
// $file=fopen("index.html","r") or exit("无法打开文件!");
// while (!feof($file))
//  {
//     echo fgetc($file);
//  }
// fclose($file);
// if ($_FILES["file"]["error"] > 0)
// {
//     echo "错误：" . $_FILES["file"]["error"] . "<br>";
// }
// else
// {
//     echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//     echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//     echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//     echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
// }
// $allowedExts = array("gif", "jpeg", "jpg", "png");
// $temp = explode(".", $_FILES["file"]["name"]);
// $extension = end($temp);        // 获取文件后缀名
// if ((($_FILES["file"]["type"] == "image/gif")
//     || ($_FILES["file"]["type"] == "image/jpeg")
// || ($_FILES["file"]["type"] == "image/jpg")
// || ($_FILES["file"]["type"] == "image/pjpeg")
// || ($_FILES["file"]["type"] == "image/x-png")
// || ($_FILES["file"]["type"] == "image/png"))
// && ($_FILES["file"]["size"] < 204800)    // 小于 200 kb
// && in_array($extension, $allowedExts))
// {
//     if ($_FILES["file"]["error"] > 0)
//     {
//         echo "错误：: " . $_FILES["file"]["error"] . "<br>";
//     }
//     else
//     {
//         echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//         echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//         echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//         echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
//     }
// }
// else
// {
//     echo "非法的文件格式";
// }
// 允许上传的图片后缀
// $allowedExts = array("gif", "jpeg", "jpg", "png");
// $temp = explode(".", $_FILES["file"]["name"]);
// echo $_FILES["file"]["size"];
// $extension = end($temp);     // 获取文件后缀名
// if ((($_FILES["file"]["type"] == "image/gif")
// || ($_FILES["file"]["type"] == "image/jpeg")
// || ($_FILES["file"]["type"] == "image/jpg")
// || ($_FILES["file"]["type"] == "image/pjpeg")
// || ($_FILES["file"]["type"] == "image/x-png")
// || ($_FILES["file"]["type"] == "image/png"))
// && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
// && in_array($extension, $allowedExts))
// {
// if ($_FILES["file"]["error"] > 0)
// {
// echo "错误：: " . $_FILES["file"]["error"] . "<br>";
// }
// else
// {
// echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
// echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
// echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

// // 判断当期目录下的 upload 目录是否存在该文件
// // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
// if (file_exists("upload/" . $_FILES["file"]["name"]))
// {
// echo $_FILES["file"]["name"] . " 文件已经存在。 ";
// }
// else
// {
// // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
// move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
// echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
// }
// }
// }
// else
// {
// echo "非法的文件格式";
// }
// class customException extends Exception{
//      public function errorMessage()
//     {
//         $errorMsg = '错误行号 '.$this->getLine().' in '.$this->getFile()
//         .': <b>'.$this->getMessage().'</b> 不是一个合法的 E-Mail 地址';

//         return $errorMsg;
        
//     }
// }
// $email='someone@example...com';
// try{
//     if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
//     {
//     // 如果是个不合法的邮箱地址，抛出异常
//     throw new customException($email);
//     }else{
//         echo '邮箱合法';
//     }
// }catch(customException $e){
//     echo $e->errorMessage();
// }
// $int = '123abc';

// if(!filter_var($int, FILTER_VALIDATE_INT))
// {
// echo  $int."不是一个合法的整数";
// }
// else
// {
// echo $int."是个合法的整数";
// }
// $var=300;

// $int_options = array(
// "options"=>array
// (
// "min_range"=>0,
// "max_range"=>256
// )
// );

// if(!filter_var($var, FILTER_VALIDATE_INT, $int_options))
// {
// echo("不是一个合法的整数");
// }
// else
// {
// echo("是个合法的整数");
// }
// $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
// echo json_encode($arr);
// class Emp {
//     public $name = "";
//     public $hobbies  = "";
//     public $birthdate = "";
// }
// $e = new Emp();
// $e->name = "sachin";
// $e->hobbies  = "sports";

// $e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));
// echo json_encode($e);
// $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

//    var_dump(json_decode($json));
//    echo '<br>';
//    var_dump(json_decode($json, true));
echo date('Y-m-d');