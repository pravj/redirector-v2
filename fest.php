<?php
    $p = $_POST["song"];
    $q = $_POST["album"];
	//$data = file_get_contents("data.txt"); [ alternate is available ]
	$data = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album/list.php");
	//echo $data;
	$t1 = str_replace('":"',",",$data);
	//echo $t1;
	$t2 = str_replace('","',",",$t1);
	//echo $t2;
	$t3 = str_replace('"},{"',",",$t2);
	//echo $t3;
	$t4 = str_replace('[{"',"",$t3);
	//echo $t4;
	$t5 = str_replace('"}]',"",$t4);
	//echo $t5; now experimenting :)
	//$input = "461 Ocean Boulevard"; // it is name of album
	$result = explode(",",$t5);
	foreach($result as $a=>$b)
	{
	    ///////////////till this everything is under action\\\\\\\\\\\\\\\\trying to re-start process in loop
	    if(strcmp($q,$b)==0)
		{
		    $z = $result[$a-2];
            $newdata = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album?id=$z"); 
            // for real one content should from [there]'s [that]
            
			
			    
	//echo $data;
	$d1 = str_replace('","',",",$newdata);
	//echo $d1;
	$d2 = str_replace('":"',",",$d1);
	//echo $d2;
	$d3 = str_replace('"},{"',",",$d2);
    //echo $d3;
	$d4 = str_replace('"',"",$d3);
	//echo $d4;
	$d5 = str_replace("{","",$d4);
	//echo $d5;
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
