<?php
if(isset($_REQUEST['arg_value']))
{
	$cat=$_REQUEST['arg_value'];
	for($i = 1; $i <= $cat; $i++)
	{
	?>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Variable Name (<?php echo $i?>)</font></div><div style="width:310px; height:40px; float:left" ><input type="text" name=<?php echo "\"var".$i+"\""?> size=31 required/></div>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Variable Dimension (<?php echo $i?>)</font></div><div style="width:310px; height:40px; float:left" ><select name="dim" onChange="getDim(this.value)">
			<option value=<?php echo "\"".$i."_0\""?>>0</option>
	        <option value=<?php echo "\"".$i."_1\""?>>1</option>
	        <option value=<?php echo "\"".$i."_2\""?>>2</option>
	</select></div><div id=<?php echo "\"ajaxresult_".$i."\""?>></div>
	<?php
	}
}
if(isset($_REQUEST['dim_value']))
{
	$cat=$_REQUEST['dim_value'];
	if($cat == 1)
	{
	?>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Syntax (C/C++)</font></div><div style="width:310px; height:40px; float:left" ><input type="radio" name="syntax" value="male">int &lt;Variable&gt; []<br>
<input type="radio" name="syntax" value="female">int *&lt;Variable&gt;</div>
<div style="width:200px; height:40px; float:left"><font size=4 color="black">Syntax (Java)</font></div><div style="width:310px; height:40px; float:left" ><input type="radio" name="syntax" value="male">int &lt;Variable&gt; []<br>
<input type="radio" name="syntax" value="female">int *&lt;Variable&gt;</div>
	<?php
	}	
	if($cat == 2)
	{
	?>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Syntax (C/C++)</font></div><div style="width:310px; height:40px; float:left" ><input type="radio" name="syntax" value="male">int &lt;Variable&gt; [][]<br>
<input type="radio" name="syntax" value="female">int **&lt;Variable&gt;</div>
<div style="width:200px; height:40px; float:left"><font size=4 color="black">Syntax (Java)</font></div><div style="width:310px; height:40px; float:left" ><input type="radio" name="syntax" value="male">int &lt;Variable&gt; [][]<br>
<input type="radio" name="syntax" value="female">int **&lt;Variable&gt;</div>
	<?php
	}
}
?>