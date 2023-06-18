<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	$no1=$_REQUEST["no1"];
	$no2=$_REQUEST["no2"];
	$query = "select * from opt where no52=$no1";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result); // 전체 레코드 개수
	$row = mysqli_fetch_array($result); 
	$query = "select * from opts where opt_no52=$no1";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="opts_new.php?no1=<?=$no1;?>";
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<table width="500" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" method="post" action="opts_new.php">
	<input type="hidden" name="no1" value="<?=$no1;?>">
  <tr height="40">
    <td width="200" valign="bottom">&nbsp 옵션명 : <font color="#0457A2"><b><?=$row['name52']; ?></b></font></td>
    		<td align="right" width="250" height="50" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
	<tr><td height="5" colspan="2"></td></tr>
    </td>
  </tr>
  	
</form>
</table>

<table width="500" border="1" cellpadding="2"  style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="50"  align="center"><font color="#142712">번호</font></td>
		<td width="250" align="center"><font color="#142712">소옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
	</tr>
	<?	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	
	$count=mysqli_num_rows($result); 

	$row=mysqli_fetch_array($result);
	$page_last=$count - $first;	

	if ($count>0) mysqli_data_seek($result,$first);
	for ($i=0; $i<$page_last; $i++) 
	{
		$row=mysqli_fetch_array($result);
		   
		 echo("<tr bgcolor='#F2F2F2'>
						<td align='center'>$row[no52]</a>
						<td align='center'>$row[name52]</td>	
						<td align='center'>
							<a href='opts_edit.php?no1=$no1&no2=$row[no52]'>수정 </a> / 
							<a href='opts_delete.php?no1=$no1&no2=$row[no52]'
								onClick='javascript:return confirm(\"삭제할까요?\");'>
								삭제
							</a>
						</td>
					</tr>");
	}
?>
</table>




</center>

</body>
</html>
