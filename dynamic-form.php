<?php
if(isset($_REQUEST['arg_value']))
{
	$cat=$_REQUEST['arg_value'];
	//echo $cat;
	for($i = 1; $i <= $cat; $i++)
	{
	?>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Variable Name (<?php echo $i?>)</font></div><div style="width:310px; height:40px; float:left" ><input type="text" name="<?php echo 'var'.$i;?>" size=31 required/></div>
	<div style="width:200px; height:40px; float:left"><font size=4 color="black">Variable Dimension (<?php echo $i?>)</font></div><div style="width:310px; height:40px; float:left" ><select name="<?php echo 'dim'.$i;?>" onChange="getDim(this.value)">
			  <option value="<?php echo $i.'_0';?>">0</option>
	        <option value="<?php echo $i.'_1';?>">1</option>
	        <option value="<?php echo $i.'_2';?>">2</option>
	</select></div><div id="<?php echo 'ajaxresult_'.$i;?>"></div>
	<?php
	}
}
if(isset($_REQUEST['dim_value']))
{
	$cat=$_REQUEST['dim_value'];
   $i=$_REQUEST['varnum'];
   //echo 'khanian='.$i;	
	//$index = strpos($cat,"_");
	//$i=strtok($cat,"_");
	//$dim=strtok("_");
	 echo $cat; 
	 echo $i;
	 
   


  	if($cat == 1)
	{
	?>
	<div style="width:200px; height:40px; float:left">
	<font size=4 color="black">Syntax (C/C++)</font>
	</div><div style="width:310px; height:40px; float:left" >
	<input type="radio" name="<?php echo 'syntaxC'.$i;?>" value="arr1">int &lt;Variable&gt; []<br>
   <input type="radio" name="<?php echo 'syntaxC'.$i;?>"  value="ptr1">int *&lt;Variable&gt;</div>
   <div style="width:200px; height:40px; float:left">
   <font size=4 color="black">Syntax (Java)</font></div>
   <div style="width:310px; height:40px; float:left" >
   <input type="radio" name="<?php echo 'syntaxJ'.$i;?>"  value="jlist1">ArrayList &lt;Variable&gt; <br>
   <input type="radio" name="<?php echo 'syntaxJ'.$i;?>"  value="jarr1">int[] &lt;Variable&gt;</div>
	<?php
	}	
	if($cat == 2)
	{
	?>
	<div style="width:200px; height:40px; float:left">
	<font size=4 color="black">Syntax (C/C++)</font></div>
	<div style="width:310px; height:40px; float:left" >
	<input type="radio" name="<?php echo 'syntaxC'.$i;?>"  value="arr2">int &lt;Variable&gt; [][]<br>
   <input type="radio" name="<?php echo 'syntaxC'.$i;?>"  value="ptr2">int **&lt;Variable&gt;<br>
   <input type="radio" name="<?php echo 'syntaxC'.$i;?>"  value="ptr12">int *&lt;Variable&gt;[]<br>
   </div>>
   <div style="width:200px; height:40px; float:left">
   
   <font size=4 color="black">Syntax (Java)</font>
   </div>
   <div style="width:310px; height:40px; float:left" >
   <input type="radio" name="<?php echo 'syntaxJ'.$i;?>" value="jarr2">int &lt;Variable&gt; [][]<br>
   <input type="radio" name="<?php echo 'syntaxJ'.$i;?>" value="jlist2">int **&lt;Variable&gt;<br>
   <input type="radio" name="<?php echo 'syntaxJ'.$i;?>" value="jset2">int **&lt;Variable&gt;
   </div>
	<?php
	}
}
?>