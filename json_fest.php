<?php
        $album = $_POST["album"];
	$song = $_POST["song"];
	$alb = "$album";
	$sng = "$song";
	$maindata = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album/list.php");
	//$maindata = file_get_contents("list.php"); //should be @ album/list.php
	$m_stg = substr_count($maindata,"language");
	$mdsolve = json_decode($maindata,true);
	
	for($i=0;$i<$m_stg;)
	{
	    if(strcmp($alb,$mdsolve[$i]['name'])==0)
		{
		    $albumId = $mdsolve[$i]['id'];
		    $albumdata = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/album?id=$albumId;");
			$a_stg = substr_count($albumdata,'track');
			$adsolve = json_decode($albumdata,true);
			for($j=0;$j<$a_stg;)
			{
			    if(strcmp($sng,$adsolve["tracks"][$j]["title"])==0)
				{
				    $trackId = $adsolve["tracks"][$j]["id"];
					$trackdata = file_get_contents("http://www.sdslabs.co.in/muzi/ajax/track?id=$trackId");
					$tdsolve = json_decode($trackdata,true);
					$last = $tdsolve['file'];
					header("Location: http://music.sdslabs.co.in/$last");
					break;
				}	
				else
				{
					$j++;
					if($j==$a_stg)
					{
						echo "No such song '".$sng."' found in album '".$alb."'....check it again";
					}
				}
			}
			break;
		}
		else
		{
			$i++;
			if($i==$m_stg)
			{
				echo "Error detected :";
				echo "<br>";
				echo "No such Album '".$alb."' found....check it again";
			}
		}
	}
?>
