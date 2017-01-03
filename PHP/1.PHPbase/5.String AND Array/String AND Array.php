<meta charset="UTF-8">
<?php
        //创建字符串
        /*
            $str ="L LOVE YOU";
            //$str ='L LOVE YOU';//$str ="L LOVE YOU"//
            echo '$str';//单引号定义的字符串不会被编译,变量会原样($str)输出
            echo "$str";//双引号会输出变量的值(L LOVE YOU)
        */

         //字符串连接
        /*
            $name='hongyuankun';
            $firstName='hong';
            echo $name.$firstName;
            echo '<html><div>'.$name.'<div/></html>'.$firstName.'....';
            echo"<html><div>$name</div></html>";
        */

	    //如何获取字符串长度
	    /*
            echo "字符串'hello'的长度:".strlen("hello");
            echo "<br/>";
            $str="welcome to China 中国";
            echo "字符串'welcome to China'的长度:".strlen("$str");//算上空格,汉字占3个字节(utf-8)
        */



        //如何查找字符串
        //查找 "Shanghai" 在 "I love Shanghai!" 中的第一次出现，并返回字符串的剩余部分：
       /*
            echo strstr("I love Shanghai!","Shanghai");
       */

	    //如何获取字符串位置
        /*
            $str ="welcome to China 中国";
            echo "搜索的字符串是:".$str;
            echo "<br/>";
            echo "需要查找的字符串是:China";
            echo "<br/>";
            echo "目标字符串的起始位置是";
            if(strpos($str,"China")){
                echo strpos($str,"China");
            }else{
                echo "搜索的字符串不包含指定查找的字符串";
            }
        */


		//截取字符串 substr(被截取的字符串,将要截取的字符串的起始截取位置)
		/*
			$str ="welcome to China 中国";
			echo "要截取的字符串是:".$str;
			echo "<br/>";
			echo "截取的起始位置是:3";
			echo "<br/>";
			echo "截取后的字符串是:".substr($str, 3);
			echo "<br/>";
			echo "指定截取字符串的长度:11";
			echo "<br/>";
			echo "截取后的字符串是:".substr($str, 3,11);
		*/


		//其他字符串操作方法

		/*
			strtolower($str)//转小写
			strtoupper($str)//转大写
			substr_count($str,$needle)//计算指定的字符出现的次数
			str_repeat($str,n)//复制字符串
			substr_replace($str,$replacement,$start[,$length])//字符串替换
		*/


		//定义关联(自定义索引值)数组
		/*
			$arr = array('name'=>'hong','age'=>18,'sex'=>'male');//定义关联数组
			print_r($arr);
			echo $arr['name'];//输出 hong
		*/


        //定义索引(整数为索引值)数组
		/*
			$food = array("牛奶","蛋糕","咖啡","饼干",2);//定义数组
			print_r($food);//结果:Array ( [0] => 牛奶 [1] => 蛋糕 [2] => 咖啡 [3] => 饼干 )	//默认数字索引数组
			var_dump($food);
		*/


			//二维数组
		/*
			$arr=array(
				'user1'=>array('name'=>'hong','age'=>'21'),
				'user2'=>array('name'=>'hong','age'=>'21')
				);
			print_r($arr);
		*/

		//访问数组
		/*
			$food = array("牛奶","蛋糕","咖啡","饼干",2);//定义数组
			print_r($food);
			echo "<br/>.................<br/>";
			echo "第一个元素是:".$food[0];
			echo "<br/>";
			echo "第二个元素是:".$food[1];
			echo "<br/>";
			echo "第三个元素是:".$food[2];
			echo "<br/>";
			echo "第四个元素是:".$food[3];
			echo "<br/>";
		*/

			//数组的遍历
		/*
			$food = array("牛奶","蛋糕","咖啡","饼干",2);//定义数组
			print_r($food);
			echo "<br/>.................<br/>";
			for($i=0;$i<count($food);$i++){
				echo $food[$i];
				echo '<br/>';
			}
		*/

			//foreach循环
	    /*
	        $arr=array('apple','banana');
	        $arr[3]='string 3';
	        print_r($arr);
	        foreach($arr as $item){//as的作用是每次从$arr取一个元素给变量$item
	        	echo $item;
	        	echo '';
	        }
	    */


	    //foreach循环
        	        /*$arr=array('apple','banana');
        	        $arr[3]='string 3';
        	        print_r($arr);
        	        foreach($arr as $key=>$item){//as的作用是每次从$arr取一个元素给变量$item
        	        	echo $item;//输出[0]=>apple [1]=>banana [3]=>string 3   (加$key才会显示索引)
        	        	echo '';//applebananastring 3
        	        }*/

	        //数组排序 sort(数组名称)  升序排列
	    /*
	        $array = array(100,243,2243,12,43,56,2,1);
	        print_r($array);
	        sort($array);
	        print_r($array);
	    */

	    /*
	        $array = array('aaa','ccc','ff','ddd','hhh');
	        print_r($array);
	        sort($array);
	        print_r($array);
	    */

	    //数组排序 rsort(数组名称)  降序排列
	    /*
	        $array = array(100,243,2243,12,43,56,2,1);
	        print_r($array);
	        rsort($array);
	        print_r($array);
		*/

	    //数组排序 shuffle(数组名称)  随机排列
	    /*
	        $array = array(100,243,2243,12,43,56,2,1);
	        print_r($array);
	        shuffle($array);
	        print_r($array);
	    */

	        //关联数组排序
	    /*
	        $arr = array('name'=>100,'age'=>90,'sex'=>80);//定义关联数组
			print_r($arr);
			asort($arr);//元素值排序
			print_r($arr);
			ksort($arr);//元素索引排序
			print_r($arr);
		*/
			//向数组添加元素 array_push()  末尾添加
		/*
			$arr = array('name'=>100,'age'=>90,'sex'=>80);
			$arr['xx']='18';
			array_push($arr,array('li'=>18));
			print_r($arr);
		*/
			//字符串转数组
		/*
			$string="A-B-C-D-E";
			$strArr=explode('-', $string);
			print_r($strArr);
		*/
			//数组转字符串implode()
		
            /*$array = array(100,243,2243,12,43,56,2,1);
			$str=implode('-', $array);
			print_r($str);*/
		
?>