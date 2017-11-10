<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="table.css" rel="stylesheet">
</head>
<body>
<h3>summary结果如下：</h3>


<div id="bodyframe" >
 <iframe src="
 <?php
  $vcompile=  $_GET["summary"];
  $vcompile=str_replace("%","%25",$vcompile);
  $com=substr($vcompile,0);
  system("python getdata.py ".$com);
  $vcompile="summary/".$vcompile;
  echo $vcompile
?>

"frameborder="0" width=100% ></iframe>
<!--" marginheight="0" marginwidth="0" frameborder="0" width=100% height=100% id="iframepage" name="iframepage" onLoad="iFrameHeight()" ></iframe>--> 

<h4>汇总如下：</h4>
<div id="sumtable"></div>
<h4>详细列表：(0表示不通过，1表示通过，空白表示未测试)</h4>
<div id="restable"></div>

<script src="jquery-1.11.3.min.js"></script>
<script src="jquery.columns.min.js"></script>
<script>
	var commitid = "<?php echo $com?>";
	$.ajax({
                url:'table/'+commitid+'_summary.json',
                dataType: 'json',
                success: function(json) {
                     restable = $('#restable').columns({
                        data:json,
                        schema:[
                            {"header":"测试用例","key":"testcase","condition":function(val) {return (val);}},
                            {"header":"pc","key":"pc","hide":true},
                            {"header":"pc","key":"pcurl","template":'<a href="{{pcurl}}">{{pc}}</a>'},
                            {"header":"jiangqin-pc","key":"jiangqin-pc","hide":true},
                            {"header":"jiangqin-pc","key":"jiangqin-pcurl","template":'<a href="{{jiangqin-pcurl}}">{{jiangqin-pc}}</a>'},
                            {"header":"qemu1","key":"qemu1","hide":true},
                            {"header":"qemu1","key":"qemu1url","template":'<a href="{{qemu1url}}">{{qemu1}}</a>'},
                            {"header":"laptop1-T43U","key":"laptop1-T43U","hide":true},
                            {"header":"laptop1-T43U","key":"laptop1-T43Uurl","template":'<a href="{{laptop1-T43Uurl}}">{{laptop1-T43U}}</a>'},
                            {"header":"laptop2-T45","key":"laptop2-T45","hide":true},
                            {"header":"laptop2-T45","key":"laptop2-T45url","template":'<a href="{{laptop2-T45url}}">{{laptop2-T45}}</a>'}
                        ]
                    });
                    sumtable = $('#sumtable').columns({
                        data:json,
                        schema:[
                            {"header":"机器名","key":"tbox","condition":function(val) {return (val);}},
                            {"header":"通过","key":"pass"},
                            {"header":"不通过","key":"failed"},
                            {"header":"未测试","key":"untest"},
                            {"header":"总测试数","key":"sum"}
                        ]
                    });
                }
        });
</script>
</div>
</body>
</html>
