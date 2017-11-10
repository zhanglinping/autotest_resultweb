<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>Highcharts</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="./highcharts_files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./highcharts_files/style.css">
<script src="./highcharts_files/hm.js"></script><script src="./highcharts_files/share.js"></script><link rel="stylesheet" href="./highcharts_files/share_style0_24.css"></head>

<body>

	<div id="demo" >
		<div id="demo_content">

			<div class="page-header">
				<h1>LKP result charts</h1>
				<div class="subtitle">
				<p class="single"><a href="https://01.org/zh/lkp" target="_blank">Linux Kernel Performance</a> test case result</p>
				</div>
				<div class="clear"></div>

				</div>

				<div align="left">

			<?php
			$benchmarks=$_GET["benchmarks"];
			$hostname=$_GET["hostname"];
			$metric=$_GET["metric"];
			$csv_path = "csv/".$benchmarks.".csv";
			echo '<h3>'.$benchmarks.'</h3>';

                        $t_exec = 'rm -rf ./cache/out.html' ;
                        #echo $t_exec;
                        $shell_result = shell_exec("$t_exec");

			$t_exec = 'python genhtml.py -i '.$csv_path.' -o cache/out.html -m '.$metric.' -b '.$benchmarks.' -c gcc-5 ' .'-n '.$hostname;
                        #echo $t_exec;
			$shell_result = shell_exec("$t_exec");
			?>

				<iframe src="cache/out.html"
				width="100%" height="500"
				frameborder="no">
				<a href="cache/out.html">CHART</a>
				</iframe>
				<div class="clearfix"></div>

			</div>
			<div class="clear"></div>


			</div>
		<div class="clear"></div>


	</div>



<script type="text/javascript" src="./highcharts_files/jquery.min.js"></script>
<script type="text/javascript" src="./highcharts_files/bootstrap.min.js"></script>
<script type="text/javascript" src="./highcharts_files/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="./highcharts_files/common.js"></script>	<script type="text/javascript" src="./highcharts_files/highcharts.js"></script>
	<script type="text/javascript" src="./highcharts_files/exporting.js"></script>
				<script type="text/javascript" src="./highcharts_files/line-basic.js"></script>

</body></html>
