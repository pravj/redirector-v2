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
	//echo 
	$d6 = str_replace("}","",$d5);
	//echo $d6;
			
			    
	
	$d7 = str_replace("[","",$d6);
	//echo $d7;
	$d8 = str_replace("]","",$d7);
	//echo $d8;
	$d9 = str_replace(":",",",$d8);
	//echo $d9; cheking so stopped.
	//now this[$d9] is ready for experiment :)
	//$in = "Bharat Mata Ki Jai"; it is name of song.
	$resul = explode(",",$d9);
	foreach($resul as $c=>$d)
	{
	    //echo $b;
		if(strcmp($p,$d)==0)
		{
		    $re = $resul[$c-2];
			$songD = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/track?id=$re");
	//echo $songD;
	$D1 = str_replace("{","",$songD);
	//echo $D1;
	$D2 = str_replace("}","",$D1);
	//echo $D2;
	$D3 = str_replace('","',",",$D2);
	//echo $D3;
	$D4 = str_replace('":"',",",$D3);
	//echo $D4;
	$D5 = str_replace('"',"",$D4);
	//echo $D5;
	$D6 = str_replace("i\/","i/",$D5);
	//echo $D6;
	$D7 = str_replace("h\/","h/",$D6);
	//echo $D7;
	//$song = "Dabangg Reloaded (Remixed By Kiran Kamath)";
	$so = explode(",",$D7);
	foreach($so as $e=>$f)
	{
	    if(strcmp($f,$p)==0)
		{$s = $so[$e+8];
		 header("Location: http://music.sdslabs.co.in/$s");
		}
		 
		
	}
		}
		
	}
			
        }			
	}
?>
