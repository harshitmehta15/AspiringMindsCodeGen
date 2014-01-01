<?php




if (isset($_POST['formsubmitted'])) 
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
          //  
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
				 $funcname = $_POST['classname'];	 	      //else assign it a variable     
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
      }	
   
   
    


  $arguments = array(); // array to hold arguments 
  $dimensions = array(); // array to hold dimensions

  for($x=0; $x<=$noofargs; $x++)
    {
      $varname = 'var'.$x;
      $dim = 'dim'.$x;
     if (empty($_POST[$varname])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter a variable name for variable ! '.$x+1. ' ' ;//add to array "error"
      } 
    else 
	 	{ 
          if(conv_check($_POST[$varname],1) && conv_check($_POST[$varname],2) ) //conv_check (string , 1/2 ) will check for naming convention of name for C and Java
				 {
				 $arguments[$x] = $_POST[$varname];	 	      //else assign it a variable     
             }	
          //  
          else 
             {       	  
              $error[] = 'The variable name you entered doesn\'t follow the Java Class Naming Convention '; 
    	       }
      }

     
    $dim = 'dim'.$x;
    if (empty($_POST[$dim])) 
	   {//if no name has been supplied 
          	$error[] = 'Please enter a dimension for the variable '.$x+1;//add to array "error"
      } 
    else 
	 	{ 
           $dimensions[$x] = $_POST[$dim];	 	      //else assign it a variable     
      }	
      
    } 

 
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
	


           
echo '<div class="errormsgbox"> <ol>';
foreach ($error as $key => $values)
	{
     echo '	<li>'.$values.'</li>';
   }
echo '</ol></div>';



   
	  
	  
	  
	   
	  
	       




?>
