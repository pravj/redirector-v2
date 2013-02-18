<?php
        //taking song and album input from html page
        $p = $_POST["song"];
        $q = $_POST["album"];
        //$data = file_get_contents("data.txt"); [ but alternate is available ]
        //store the page content on that page
	$data = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album/list.php");
	//replacing undesired strings 
	$t1 = str_replace('":"',",",$data);
	$t2 = str_replace('","',",",$t1);
	$t3 = str_replace('"},{"',",",$t2);
	$t4 = str_replace('[{"',"",$t3);
	$t5 = str_replace('"}]',"",$t4);
	//echo $t5; now experimenting :)
	//separte all by comma(,) 
	$result = explode(",",$t5);
	foreach($result as $a=>$b)
	{
	    ///////////////till this everything is under action
	    ///////////////trying to re-start process in loop
	    //compare strings $q and $b for equality
	    if(strcmp($q,$b)==0)
		{   
                    //extracting 2nd element to left of equaly matched string[the album name]
		    $z = $result[$a-2];
		    //store the page content on that inner one page
                    $newdata = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album?id=$z"); 
                    // for real one content should from [there]'s [that]
                    //again replacing undesired strings
	            $d1 = str_replace('","',",",$newdata);
	            $d2 = str_replace('":"',",",$d1);
	            $d3 = str_replace('"},{"',",",$d2);
	            $d4 = str_replace('"',"",$d3);
	            $d5 = str_replace("{","",$d4);
                    $d6 = str_replace("}","",$d5);
	            $d7 = str_replace("[","",$d6);
         	    $d8 = str_replace("]","",$d7);
	            $d9 = str_replace(":",",",$d8);
	            //now [$d9] is ready for experiment :)
	            //again seprate by comma(,);
	            $resul = explode(",",$d9);
	            foreach($resul as $c=>$d)
	            {
		      if(strcmp($p,$d)==0)
		      {
		         $re = $resul[$c-2];
		         //redirecting at "url" to store that's content
			 $songD = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/track?id=$re");
	                 $D1 = str_replace("{","",$songD);
	                 $D2 = str_replace("}","",$D1);
	                 $D3 = str_replace('","',",",$D2);
	                 $D4 = str_replace('":"',",",$D3);
	                 $D5 = str_replace('"',"",$D4);
	                 $D6 = str_replace("i\/","i/",$D5);
	                 $D7 = str_replace("h\/","h/",$D6);
	                 $so = explode(",",$D7);
	                 foreach($so as $e=>$f)
	                 {
	                   if(strcmp($f,$p)==0)
		           {
		              $s = $so[$e+8];
		              //at last now it is on destination
		              header("Location: http://music.sdslabs.co.in/$s");
		           }
		         }
		      }
		
	            }
	         }			
	}
?>
