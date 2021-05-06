<html>
<head>
<title>Certification</title>
<style type="text/css">
body { font-family: Arial; font-size: 25.4px }
</style>
<script type="text/javascript">
	window.print();
</script>
</head>
<body>
@foreach($cerfs as $cert)
@endforeach
<nobr><nowrap>

<div id="_0:0" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:0">
<img name="_1100:850" src="{{ asset('assets/img/page_001.jpg') }}" height="1100" width="850" border="0" usemap="#Map"></div>
<div id="_317:137" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:137;left:317">
<span id="_19.2" style=" font-family:Times New Roman; font-size:19.2px; color:#000000">
Department of Education</span>
</div>
<div id="_390:161" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:161;left:390">
<span id="_15.1" style="font-style:italic; font-family:Arial; font-size:15.1px; color:#000000">
Region V</span>
</div>
<div id="_309:180" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:180;left:309">
<span id="_19.4" style=" font-family:Times New Roman; font-size:19.4px; color:#000000">
DIVISION OF NAGA CITY</span>
</div>
<div id="_385:206" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:206;left:385">
<span id="_16.3" style=" font-family:Times New Roman; font-size:16.3px; color:#000000">
Naga City</span>
</div>
<div id="_300:244" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:235;left:300">
<span id="_13.2" style=" font-family:Times New Roman; font-size:13.2px; color:#000000">
Roxas Avenue, Diverrsion Road, Naga City</span>
</div>
<div id="_295:293" style=" position: absolute; z-index: 0; left: 0px; top: 0px;top:293;left:295">
<span id="_24.4" style=" font-family:Times New Roman; font-size:24.4px; color:#000000">
C E R T I F I C A T I O N</span>
</div>

<div id="_160:347" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:347;left:90">
<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000;">
<?php
$str="This is to certify that based on the records on file of this office, $cert->name & $cert->position, of $cert->station this Division, had incurred the following leave of absences without pay:";
$total=str_word_count($str);
$value=explode(' ', $str);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
$newtext2 = wordwrap($str, 80, "<br>");
echo $newtext2;
//for ($i=0; $i <$total ; $i++) { 
//	if ($i<15) {
//		echo $value[$i].' ';
//	}
//}
?>
<br>
<?php  
//for ($i=15; $i <$total ; $i++) { 
//	if ($i<28) {
//		echo $value[$i].' ';
//	}
//}
?>
<br>
<?php  
//for ($i=28; $i <=$total ; $i++) { 
//	echo $value[$i].' ';
//}
//for ($i=28; $i <=$total ; $i++) { 
//	if ($value[$total]!=="pay:") {
//		echo "pay:";//break;	
//	}

//}


?>
</span>
</div>

<?php $top=465; for ($i=0; $i < 4; $i++) { ?>
{{-- 	<div id="_151:489" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:{{$top+=12}}px;left:151">
<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
Nov 2020,2017</span>
</div>
<div id="_434:489" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:{{$top+=12}}px;left:434">
<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
-Sick Leave without pay</span>
</div> --}}
<?php } ?>
<?php
$num=(int) ($cerfs->count()/2 );
$left=(int) ($cerfs->count()-$num);
$maximum = max($num,$left);
if (intval($cerfs->count())<=10) {?>
<table style=" position: absolute; z-index: 0; left: 0px;top: 0px;top: 465;left:260">
	@foreach($cerfs as $cert)
		<tr>
			<td>
			<?php
				$slice=explode(' ', $cert->inclusiveDates);
				echo $slice[0];	
			?>
			</td>
			<td width="10%" align="center">-</td>
				<?php if($cert->natureOfLeave=='SL'){?>
			<td>Sick leave w/out pay</td>
				<?php }elseif($cert->natureOfLeave=='VL'){?>
			<td>Vacation leave w/out pay</td>
			<?php }else{?>
				<td>{{$cert->natureOfLeave}} w/out pay</td>
			<?php }?>
		</tr>
	@endforeach
</table>
<?php }else{ ?>
<table style="font-size: 13px; position: absolute; z-index: 0; left: 0px;top: 0px;top: 435;left:135">
<?php for ($i=0; $i <max($num,$left); $i++) {?> 
<tr>
	<td style="width: -10%;font-size: 11px">
		<?php
			echo $stringWord = strtr($cerfs[$i]['inclusiveDates'], ' ', '');
			$slice=explode(' ', $stringWord);
			//echo $slice[0];
		?>
	</td>
	<td align="center">-</td>
	<?php if($cert->natureOfLeave=='SL'){?>
	<td style="font-size: 11px">Sick leave w/out pay</td>
	<?php }elseif($cert->natureOfLeave=='VL'){?>
	<td style="font-size: 11px">Vacation leave w/out pay</td>
	<?php }else{?>
	<td style="font-size: 11px">{{$cert->natureOfLeave}} w/out pay</td>
	<?php }?>
</tr>
<?php } ?>
</table>
<table style="font-size: 13px; position: absolute; z-index: 0; left: 0px;top: 0px;top: 435;left:445">
<?php for ($i=max($num,$left); $i <$cerfs->count(); $i++) {?> 
<tr>
	<td style="width: -10%;font-size: 11px">
		<?php
			echo $stringWord = strtr($cerfs[$i]['inclusiveDates'], ' ', '');
			$slice=explode(' ', $cerfs[$i]['inclusiveDates']);
			//echo $slice[0];
		?>
	</td>
	<td align="center">-</td>
	<?php if($cert->natureOfLeave=='SL'){?>
	<td style="font-size: 11px">Sick leave w/out pay</td>
	<?php }elseif($cert->natureOfLeave=='VL'){?>
	<td style="font-size: 11px">Vacation leave w/out pay</td>
	<?php }else{?>
	<td style="font-size: 11px">{{$cert->natureOfLeave}} w/out pay</td>
	<?php }?>
</tr>
<?php } ?>
</table>
<?php } 

if ($maximum>=17 && $maximum<=18) { ?>
	<div id="_163:724" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:816;left:163">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	Issued this __________________ at Naga City in connection with his/her </span>
	</div>
	<div id="_113:749" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:852;left:113">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	__________________________________.</span>
	</div>
	<div id="_487:874" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:950;left:487">
	<span id="_14.6" style="font-weight:bold; font-family:Times New Roman; font-size:14.6px; color:#000000">
	SHIELA MARGARITA M. DURANTE</span>
	</div>
	<div id="_527:893" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:970;left:527">
	<span id="_14.5" style=" font-family:Times New Roman; font-size:14.5px; color:#000000">
	Administrative Officer IV</span>
	</div>
<?php }elseif($maximum>=19){ ?>
	<div id="_163:724" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:888;left:163">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	Issued this __________________ at Naga City in connection with his/her </span>
	</div>
	<div id="_113:749" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:920;left:113">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	__________________________________.</span>
	</div>
	<div id="_487:874" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:1010;left:487">
	<span id="_14.6" style="font-weight:bold; font-family:Times New Roman; font-size:14.6px; color:#000000">
	SHIELA MARGARITA M. DURANTE</span>
	</div>
	<div id="_527:893" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:1030;left:527">
	<span id="_14.5" style=" font-family:Times New Roman; font-size:14.5px; color:#000000">
	Administrative Officer IV</span>
	</div>
<?php }else{ ?>
<div id="_163:724" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:744;left:163">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	Issued this __________________ at Naga City in connection with his/her </span>
	</div>
	<div id="_113:749" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:780;left:113">
	<span id="_18.9" style=" font-family:Times New Roman; font-size:18.9px; color:#000000">
	__________________________________.</span>
	</div>
	<div id="_487:874" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:884;left:487">
	<span id="_14.6" style="font-weight:bold; font-family:Times New Roman; font-size:14.6px; color:#000000">
	SHIELA MARGARITA M. DURANTE</span>
	</div>
	<div id="_527:893" style=" position: absolute; z-index: 0; left: 0px; top: 0px; top:907;left:527">
	<span id="_14.5" style=" font-family:Times New Roman; font-size:14.5px; color:#000000">
	Administrative Officer IV</span>
	</div>
<?php } ?>



</nowrap></nobr>
</body>
</html>
