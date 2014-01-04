<?php

$return_type='int';
$variable_type='int'; 

if (isset($_POST['submit']))
{
	 $error = array();//Declare An Array to store any error message  
    if (empty($_POST['funcname'])) 
	   {  //if no name has been supplied 
        	$error[] = 'Please enter a function name! ';//add to array "error"
      } 
    else 
	 	 { 
          if(conv_check($_POST['funcname'],1) && conv_check($_POST['funcname'],2) ) //conv_check (string , 1 ) will check for naming convention of Function name
				{
				 $funcname = $_POST['funcname'];	 	      //else assign it a variable     
            }	  
          else 
             {       	  
              $error[] = 'The function name you entered doesn\'t follow the C or Java Function Naming Convention '; 
    	       }
      }

   
    if (empty($_POST['classname'])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter a class name! ';//add to array "error"
      } 
    else 
	 	{ 
          if(conv_check($_POST['classname'],2)) //conv_check (string , 1 ) will check for naming convention of class name for java
				{
				 $classname = $_POST['classname'];	 	      //else assign it a variable     
            }	
          //  
          else 
             {       	  
              $error[] = 'The function name you entered doesn\'t follow the Java Class Naming Convention '; 
    	       }
      }  

    
    if (empty($_POST['noofargs'])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter number of arguments ';//add to array "error"
      } 
    else 
	 	{ 
         $noofargs = $_POST['noofargs'];	 	      //else assign it a variable     
         //echo $noofargs;
      }	
   
     
    


  $varnames = array(); // array to hold arguments 
  $dimensions = array(); // array to hold dimensions
  $arglistC=array();      //array to hold arg list elemnts
  $arglistJ=array();     //array to hold list of Java
   
   
   
  for($x=1; $x<=$noofargs; $x++)
    { 
      $varname = 'var'.$x;
      $dim = 'dim'.$x;
      if (empty($_POST[$varname])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter a variable name for variable !';//add to array "error"
      } 
      else 
	 	{ 
          if(conv_check($_POST[$varname],1) && conv_check($_POST[$varname],2) ) //conv_check (string , 1/2 ) will check for naming convention of name for C and Java
  				 {
				 $varnames[$x] = $_POST[$varname];	 	      //else assign it a variable     
             }	
          //  
          else 
             {       	  
              $error[] = 'The variable name you entered doesn\'t follow the Java Class Naming Convention '; 
    	       }
      }

     
    
    if (empty($_POST[$dim])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter a dimension for the variable '.$x;//add to array "error"
      } 
    else 
	 	{ 
	 	     $indexof_= strpos($_POST[$dim],'_'); //extracting dimension which is in the form f i_1 , where 1 is the dimension.
	 	     $indexof_ = $indexof_ + 1;
	 	     $extdim =substr($_POST[$dim],$indexof_, $length = 1);
           $dimensions[$x] = $extdim;	 	      //else assign it a variable     
      }	
      
    //echo $x;  
    
   
    $synC='syntaxC'.$x;
     
    
    $synJ='syntaxJ'.$x;
    
   
   if($dimensions[$x]== "0")
      {
     
      $arglistC[$x] = $variable_type.' '.$varnames[$x];          
      $arglistJ[$x] = $variable_type.' '.$varnames[$x];   
         
      }     
   
     
   else if($dimensions[$x] == "1")   
      {
         $syntaxC=$_POST[$synC];  
         $syntaxJ=$_POST[$synJ]; 
      	switch ($syntaxC) 
      	   {
        				case "arr1":
        					$arglistC[$x]=$variable_type.' '.$varnames[$x].'[]';
        					break;
    					case "ptr1":
        					$arglistC[$x]=$variable_type.' *'.$varnames[$x];
        					break;
            }
        
        switch ($syntaxJ) 
      	   {
        				case "jarr1":
        					$arglistJ[$x]=$variable_type.'[] '.$varnames[$x];
        					break;
    					case "jlist1":
        					$arglistJ[$x]='ArrayList '.$varnames[$x].'&lt;'.$variable_type.'&gt;';
        					break;
        				case "jset1":
        					$arglistJ[$x]='Set '.$varnames[$x].'&lt;'.$variable_type.'&lt;';
        					break;	
            }        
        
      }
  
  else if($dimensions[$x] == "2")
     { 
        $syntaxC=$_POST[$synC];  
        $syntaxJ=$_POST[$synJ]; 
        switch ($syntaxC) 
      	   {
        				case "arr2":
        					$arglistC[$x]=$variable_type.' '.$varnames[$x].'[][]';
        					break;
    					case "ptr2":
        					$arglistC[$x]=$variable_type.' **'.$varnames[$x];
        					break;
                  case "ptr12":
        					$arglistC[$x]=$variable_type.' *'.$varnames[$x].'[]';
        					break;            
            }
        
        switch ($syntaxJ) 
      	   {
        				case "jarr2":
        					$arglistJ[$x]=$variable_type.'[][] '.$varnames[$x];
        					break;
    					case "jlist2":
        					$arglistJ[$x]='ArrayList '.$varnames[$x].'&lt;'.$variable_type.'&gt;';
        					break;
        				case "jset2":
        					$arglistJ[$x]='Set '.$varnames[$x].'&lt;'.$variable_type.'&gt;'; // various forms can be updated here
        					break;	
            }  
     }					
  }  
//echo $arglistC[1];

create_stringC($funcname,$classname,$noofargs,$arglistC,$return_type);
create_stringJava($funcname,$classname,$noofargs,$arglistJ,$return_type);
echo '<div class="errormsgbox"> <ol>';
foreach ($error as $key => $values)
	{
    echo '	<li>'.$values.'</li>';
   }
echo '</ol></div>';
} 
 







function conv_check($name , $opt)
{
	switch ($opt)
  			{
			case "1":
 				 if(preg_match("/^[A-Za-z_][A-Za-z_0-9]*$/", $name))  //matching convention for variable name in C
             return TRUE;
             else 
             return FALSE;
  				 break;
			case "2":
 				 if(preg_match("/(^[a-zA-Z][a-zA-Z0-9_]*)|(^[_][a-zA-Z0-9_]+)$/", $name)) //matching convention for variable name in Java
             return TRUE;
             else 
             return FALSE;
  				 break;
     			default:
 				 echo "Wrong Input";
             return FALSE;
			}
} 

function create_stringC($funcname,$classname,$noofargs,$arglistC,$return_type) 
{

//for C language
$argumentlistC = '';
for($x = $noofargs; $x>=2 ; $x--)
$argumentlistC = ' ,'.$arglistC[$x].$argumentlistC;
$argumentlistC = $arglistC[1].$argumentlistC;


$CCode = $return_type.' '.$funcname.'('.$argumentlistC.')'."{<br>".'//write your code here'."<br><br>".'}'; 


echo $CCode;
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

}   

function create_stringJava($funcname,$classname,$noofargs,$arglistJ,$return_type) 
{

//for C language

$argumentlistJ = '';
for($x = $noofargs ; $x>=2 ; $x--)
$argumentlistJ = ' ,'.$arglistJ[$x].$argumentlistJ;
$argumentlistJ = $arglistJ[1].$argumentlistJ;
 


$JavaCode = 'public class '.$classname.'{'."<br>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'public '.$return_type.' '.$funcname.'('.$argumentlistJ.')'."{<br>".'//write your code here'."<br><br>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'}'."<br>".'}'; 



echo $JavaCode;

}   
	
 



?>
