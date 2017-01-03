<meta charset="UTF-8">
<?php

		$timestamp=time();//获取时间
		echo "当前系统的时间戳为:".$timestamp;
		echo "<br/>";

		//date(format,timestamp)
		$date=date("m-d-Y h:i:sA",$timestamp);//获取日期及时间
		echo "根据时间戳获取的系统日期和时间是:".$date;
		//1.得到高考的时间戳
		$time1 = mktime(0,0,0,3,29,2016);
		//2.得到当前时间戳
		$now = time();
		//3.计算差值,转换成天
		echo intval(($time1-$now)/(24*60*60))."天";

?>