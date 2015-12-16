<?php
		//获取系统时间
		date_default_timezone_set("PRC");

		$h =date("H");
		$i =date("i");
		$s =date("s");
		//1.创建资源（画布的大小）
	$img = imagecreatetruecolor(200, 250);
		//2.设置画布的颜色
	$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
	$red = imagecolorallocate($img, 255, 0, 0);
	$blue = imagecolorallocate($img, 0, 0, 0xFF);
	$pink = imagecolorallocate($img, 0xFF, 0, 0xFF);
	$green = imagecolorallocate($img, 0, 0xFF, 0);


	imagefill($img, 0, 0, $white);
		//3.制作各种颜色
	imageellipse($img, 100, 100, 190, 190, $blue);
	imagefilledellipse($img, 100, 100, 4, 4, $blue);

	imagestring($img, 3, 95, 8, "12", $blue);
	imagestring($img, 3, 180, 95, "03", $blue);
	imagestring($img, 3, 95, 180, "06", $blue);
	imagestring($img, 3, 12, 95, "09", $blue);

	//秒针
	//imageline($img, 100, 100, 180, 80, $red);

	$len = 80;

	$a = $len*sin(pi()/30*$s);
	$b = $len*cos(pi()/30*$s);
	$x = 100 + $a;
	$y = 100 - $b;
	imageline($img, 100, 100, $x, $y, $red);

	//分针
	$lin = 60;
	$c = $lin*sin(pi()/30*$i);
	$d = $lin*cos(pi()/30*$i);
	$n = 100 + $c;
	$m = 100 - $d;	
	imageline($img, 100, 100, $n, $m, $red);
	imageline($img, 100+1, 100-1, $n, $m, $red);
	//时针
	$lhn = 40;
	$e = $lhn*sin(pi()/6*$h);
	$f = $lhn*cos(pi()/6*$h);
	$o = 100 + $e;
	$p = 100 - $f;	
	imageline($img, 100, 100, $o, $p, $red);
	imageline($img, 100+1, 100-1, $o, $p, $red);
	imageline($img, 100+1, 100+1, $o, $p, $red);
	imageline($img, 100-1, 100+1, $o, $p, $red);
	imageline($img, 100-1, 100-1, $o, $p, $red);


	imagestring($img, 5, 20, 230, "NOW: {$h}:{$i}:{$s}", $red);		//4.保存或输出给浏览器,写第二个参数就是保存
	header("Content-Type:image/png");
	imagepng($img );
	//imagepmg($img,"./huge.png");与上两句的作用效果相同
		//5.释放资源
	imagedestroy($img);
?>