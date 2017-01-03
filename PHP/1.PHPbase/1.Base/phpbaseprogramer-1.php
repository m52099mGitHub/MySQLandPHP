<meta charset="utf-8">//防止中文乱码
<?php
	/*$name='Hong';//php的变量以$开头;//值赋值
	echo $name;//echo打印变量$name;
	$color1='red';//值赋值

	//引用赋值
	$name2=&$name;//&$name将获得的地址给$name2

	//常量
	define('PI2','3.14');
	define('PI3','3.15');
	echo PI2;
	echo PI3;

	//数据类型(不用指定数据的类型,)
	$age=12;
	$name=hyk;
	$weight=13.5;*/
    
    //赋值运算符
    $a =10;
    $c =++$a;//先加1再赋值
    $b =$a++;//先赋值再加1
    echo $b;
    echo $c;

    //关系运算符
    $a=123;
    $b="123";
    if($a===$b)
    	echo "......$a===$b";
    else
    	echo "......   $a!===$b";
    if($a==$b)
    	echo ".....$a==$b";
    else
    	echo "$a!==$b";

    //三元(目)运算符
    $a=90;
    $b=100;
    echo $a>$b?"a..gt..b":"a..lt..b";

    //字符串连接
    $a="今天是";
    $b="我";
    $c="生日";
    echo $a.$b.$c;



    //创建函数
    function stringConnect($who,$where,$what){
	$str=$who.$where.$what;
	return $str;
	}
	echo stringConnect("xx","ss","sing");
?>