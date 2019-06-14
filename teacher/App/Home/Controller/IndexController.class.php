<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function swi(){
        $start_time=date('Y-m-d H:m:s');
        $_SESSION['start_time']=$start_time;

        $date1=$_SESSION['start_time'];
        $date2=date('Y-m-d H:m:s');
        $start_time=strtotime($date1);
        $end_time=strtotime($date2);

        //计算天数
        $time_diff = $end_time-$start_time;
        $days = intval($time_diff/86400);
        //计算小时数
        $remain = $time_diff%86400;
        $hours = intval($remain/3600)+2;
        //计算分钟数
        $remain = $remain%3600;
        $min = intval($remain/60);
        //计算秒数
        $secs = $remain%60;
        $time=$hours*3600+$min*60+$secs;
        $times=$time/60;

        if($_SESSION['start_time']!=null){
            $arr=array(
                "info"=>$times,
                "code"=>"200",
            );
        }
        $this->ajaxReturn($arr);
    }
    public function estimate(){
        $this->display();
    }
    public function si(){

        $date1=$_SESSION['start_time'];
        $date2=date('Y-m-d H:m:s');
        $start_time=strtotime($date1);
        $end_time=strtotime($date2);

        //计算天数
        $time_diff = $end_time-$start_time;
        $days = intval($time_diff/86400);
        //计算小时数
        $remain = $time_diff%86400;
        $hours = intval($remain/3600);
        //计算分钟数
        $remain = $remain%3600;
        $min = intval($remain/60);
        //计算秒数
        $secs = $remain%60;
        $time=$hours*3600+$min*60+$secs;

        $m=M('teacher');
        if($time>7200){
            $data = array(
                'time' =>'是',
                'start_time'=>$_SESSION['start_time'],
                'end_time' => date('Y-m-d H:m:s')
            );

            $result = $m->data($data)->add();

            if($result){
                $arr=array(
                    "info"=>'1',
                    "code"=>"200",
                );
            }
        }else{
            $data = array(
                'time' =>'否',
                'start_time'=>$_SESSION['start_time'],
                'end_time' => date('Y-m-d H:m:s')
            );
            $result = $m->data($data)->add();
            if($result){
                $arr=array(
                    "info"=>'2',
                    "code"=>"200",
                );
            }
        }





        $this->ajaxReturn($arr);
    }



}