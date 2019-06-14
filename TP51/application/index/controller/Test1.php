<?php


namespace app\index\controller;


class Test1
{
    protected  $a='protect';
    public  $b = 'public';

    public  function  c()
    {
        echo $this->a;
    }
    public   static  function  d()
    {
       return 1;
    }
    protected  function  e()
    {
        return 2;
    }

}
class  test2 extends  Test1{
    public  function  a()
    {
        echo $this->b;
        $this->e();
    }


}
$test1 = new  Test1();
 $test1->e;

 $test2 = new  test2();
 $test2->a();


