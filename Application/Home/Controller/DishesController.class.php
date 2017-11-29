<?php
namespace 	Home\Controller;
use 	 	Think\Controller;
class DishesController extends Controller {
    public function dishes(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $Dishes=D('Dishes');
            $sql = $Dishes->where(1)->select(); 
            echo json_encode($sql);
        }else{
            echo $response='请求错误';
        }
    }
}