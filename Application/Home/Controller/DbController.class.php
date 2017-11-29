<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class DbController extends Controller {
    //创建数据表
    public function createDb(){
        $conn = mysqli_connect(C('DB_HOST').':'.C('DB_PORT'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'));
        if(!$conn){
            die('Could not connect: ' . mysqli_error($con));
        }else{
            // 使用 sql 创建数据表
            $sql = "CREATE TABLE dishes (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            dishesName VARCHAR(30),
            class VARCHAR(30),
            num VARCHAR(30) NOT NULL,
            price VARCHAR(30) NOT NULL,
            img VARCHAR(100),
            dishesStatus VARCHAR(50) NOT NULL,
            praise VARCHAR(20),
            sale VARCHAR(20),
            comment VARCHAR(30),
            selectnum VARCHAR(20)
            )";
            
            if ($conn->query($sql) === TRUE) {
                echo "Table MyGuests created successfully";
            } else {
                echo "创建数据表错误: " . $conn->error;
            }
            $conn->close();
        }
        
    }
    //插入数据
    public function insertDb(){
        $Dishes=D('Dishes');
        $Dishes->dishesName='番茄炒蛋';
        $Dishes->class='炒菜';
        $Dishes->num='100';
        $Dishes->price='12.00';
        $Dishes->dishesStatus='1';
        $Dishes->img='http://img0.imgtn.bdimg.com/it/u=2799540341,2022126839&fm=200&gp=0.jpg';
        $Dishes->praise='21';
        $Dishes->sale='101';
        $Dishes->comment='99';
        $Dishes->selectnum=0;
        print($Dishes->add());
        $Dishes->dishesName='水煮肉片';
        $Dishes->class='汤菜';
        $Dishes->num='80';
        $Dishes->price='25.00';
        $Dishes->dishesStatus='1';
        $Dishes->img='http://img3.imgtn.bdimg.com/it/u=3650469167,1873328450&fm=27&gp=0.jpg';
        $Dishes->praise='11';
        $Dishes->sale='55';
        $Dishes->comment='37';
        $Dishes->selectnum=0;
        print($Dishes->add());
        $Dishes->dishesName='蒜泥黄瓜';
        $Dishes->class='凉菜';
        $Dishes->num='76';
        $Dishes->price='15.00';
        $Dishes->dishesStatus='1';
        $Dishes->img='http://img1.imgtn.bdimg.com/it/u=3641002719,2230161272&fm=27&gp=0.jpg';
        $Dishes->praise='86';
        $Dishes->sale='101';
        $Dishes->comment='100';
        $Dishes->selectnum=0;
        print($Dishes->add());
    }
    //查询所有数据
    public function readDb(){
        header("Content-type: text/html; charset=utf-8");
        $Dishes=D('Dishes');
        $sql = $Dishes->where(1)->select(); 
        print_r($sql);
    }
}