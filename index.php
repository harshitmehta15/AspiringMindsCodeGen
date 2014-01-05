<html>
<head>
<title>Programming Portal | Aspiring Mind</title>
<script type="text/javascript" src="jquery.js"></script>
<script language="javascript">
function getXMLHTTP()
{
	var xmlhttp=null;
	try {
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)
		{
			try {
					xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					try {
							xmlhttp=new ActiveXObject("msxml2.XMLHTTP");
						}
						catch(e1)
						{
							xmlhttp=false;
						}
				}
		}
		return xmlhttp;
}
var req=getXMLHTTP();
function getArg(cat) 
{
	var req=getXMLHTTP();
	if(req==null)
	{
		alert("browser error");
	}
	if(req)
	{
		var strurl="dynamic-form.php?arg_value="+cat;
		//alert(strurl);
		req.onreadystatechange=function()
		{
			if(req.readyState ==4 || req.readyState=="complete")
			{	
				document.getElementById("ajaxresult_0").innerHTML=req.responseText;
			}
		}
		req.open("GET",strurl,true);
		req.send(null);
	}
}
function getDim(arg,vname) 
{
	
  	
	var req=getXMLHTTP();
	if(req==null)
	{
		alert("browser error");
	}
	if(req)
	{
		alert(vname);
		var index = arg.indexOf("_");
		var ret = arg.substr(0,index);
		var cat = arg.substr(index+1,arg.length);
		
		var strurl="dynamic-form.php?dim_value="+cat+"&varnum="+ret+"&varname="+vname;
      //alert(strurl);    
      req.onreadystatechange=function()
		{
			if(req.readyState == 4 || req.readyState=="complete")
			{	
				document.getElementById("ajaxresult_"+ret).innerHTML=req.responseText;
			}
		}
		req.open("GET",strurl,true);
		req.send(null);
	}
}
</script>
</head>
<body>
<div style="width:600px; height:100px; float:left">
<form action="backend.php" method="post">
<div style="width:200px; height:40px; float:left"><font size=4 color="black">Function Name</font></div><div style="width:310px; height:40px; float:left"><input type="text" name="funcname" size=31 required/></div>
<div style="width:200px; height:40px; float:left"><font size=4 color="black">Class Name</font></div><div style="width:310px; height:40px; float:left"><input type="text" name="classname" size=31 required/></div>
<div style="width:200px; height:40px; float:left"><font size=4 color="black">Number of Arguments</font></div><div style="width:310px; height:40px; float:left">
<select name="noofargs" id="select"  onChange="getArg(this.value)">
<?php 

for($i=0; $i<=1000; $i++)
{

echo "<option value=".$i.">".$i."</option>";
}
?> 		  
		  
</select>

</div>
<div id="ajaxresult_0"></div>
<input style="margin:15px 0px 0px 5px" type="image" src="submit_reg.jpg" name="submit" value="formsub"/>
</form>
</div>
</body>
</html>