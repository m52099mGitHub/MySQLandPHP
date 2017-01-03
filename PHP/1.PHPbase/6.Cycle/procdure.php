<meta charset="UTF-8">
<?php
	//选择结构  if选择结构/switch选择结构
	/*$score =100;
	if($score>90){
	    echo 'apple';
	}*/

	/*$uname =$_POST["username"];
	$upwd =$_POST["userpwd"];
	$sys_username ="aptech";
	$sys_userpwd ="123456";

	if($uname!=$sys_username){
		echo "用户名错误,请再次输入";
	}else if($upwd!=$sys_userpwd){
		echo "密码输入错误,请再次输入";
	}else{
		echo "用户名和密码验证通过";
	}*/

	//switch选择结构
	/*$mingCi =1;
	switch($mingCi){
		case 1:
			echo "获得奖金1万元"."<br/>";
			break;
		case 2:
			echo "获得奖金2万元"."<br/>";
			break;
		case 3:
			echo "获得奖金3万元"."<br/>";
			break;
		default:
			echo "没奖学金";
	}*/

	//循环结构:while循环,do...while循环,for循环,foreach(增强型for循环)

	//循环结构:while循环
	/*$loop =1;//计数器
	while($loop<10){
		echo "循环执行第".$loop."次<br/>";
		$loop++;
	}*/
	//do...while循环
	$loop =0;//计数器
	do{
		echo "循环执行第".$loop."次<br/>";
		$loop++;
	}while($loop<10)


	//for循环
	/*for($i=0;$i<10;$i++){
		echo "好好学习!"."<br/>";
	}*/

    /*$sumEven;
    $sumOdd;
    for($i=1;$i<=100;$i++){
        if($i%2==0){
            $sumEven+=$i;
        }else{
            $sumOdd+=$i;
        }
    }
    echo $sumEven+" "+$sumOdd;*/
	//continue只能用在循环结构中
	/*for($i=0;$i<10;$i++){
		if($i==4){
			continue;
		}
		if($i==6){
			break;
		}
		echo "当前数字是:".$i."<br/>";
	}*/


?>