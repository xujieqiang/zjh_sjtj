<!DOCTYPE HTML>
<?php 
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
<title>上传全家福照片</title>
 
 <link rel="stylesheet" href="/xstj/public/static/layui/css/layui.css"  media="all">
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadifive.css">
 
<script type="text/javascript">
	
</script>
</head>

<body>
	 <div class="layui-container">
	<?php
	$id=$_GET['id'];
	 
	$_SESSION['idd']=$id;
	?>
	<table class="layui-table" border="0">
		<tr height="100" bgcolor="#98D7AC"><td align="center" valign="center"><h1>上传全家福照片 </h1><br /></td></tr>
		<tr><td><p><font size="3" color="#00A2D4">上传1张照片即可，完成后，点击“下一步”</font></p><br /></td></tr>
		<!-- tr><td><p><font size="3" color="#CC2255">只要传</font></p><br /></td></tr -->
		
		<form action="http://amytg.ljesu.top/xstj/public/index/index/successrs" method="post" >
		<tr height="80"><td align="center">
		<p><font size="3" color="#CC2255">先点击下面按钮“SELECT FILES” 选择照片<br /> <br />然后点击 “上传” 按钮<br /> <br />最后点击  “下一步”按钮</font></p><br />
			<div id="queue"></div>
			<input id="file_upload" name="file_upload" type="file"  > </td></tr>
		<tr height="80"><td align="center">
			<a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')"><font size="4" color="#C7254E">上传</font></a>
		<input type="hidden" name="id" value="<?php echo $id;  ?>" />
		
		</td></tr>
		
		<tr height="60"><td valign="center" align="center">
		
			<input type="submit" class="layui-btn  layui-btn-lg" onclick="" name="submit" value="下一步" />
		</td></tr></form>
	</table>
	
	
	
</div>
	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadifive({
				'auto'             : false,
				'checkScript'      : 'check-exists.php',
				'fileType'         : 'image/png',
				'formData'         : {
									   'timestamp' : '<?php echo $timestamp;?>',
									   'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
										
				                     },
				'queueID'          : 'queue',
				'uploadScript'     : 'uploadifive.php',
				
				
				'onUploadComplete' : function(file, data) { console.log(data); }
			});
		});
	</script>
</body>
</html>