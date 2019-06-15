<?php

// getting the values from html
$xpost = $_POST["xpos"];
$ypost = $_POST["ypos"];
$startconv = $_POST["startcon"];
$stopconv = $_POST["stopcon"];
$startware = $_POST["startwh"];
$stopware = $_POST["stopwh"];
$autoware = $_POST["autowh"];

$fileContent0=$xpost."\n";
$fileContent1=$ypost."\n";
$fileContent2=$startconv."\n";
$fileContent3=$stopconv."\n";
$fileContent4=$startware."\n";
$fileContent5=$stopware."\n";
$fileContent6=$autoware."\n";

$fileStatus0=file_put_contents("../text_files/xposition.txt",$fileContent0,FILE_APPEND);
$fileStatus1=file_put_contents("../text_files/yposition.txt",$fileContent1,FILE_APPEND);
$fileStatus2=file_put_contents("../text_files/start_conveyor.txt",$fileContent2,FILE_APPEND);
$fileStatus3=file_put_contents("../text_files/stop_conveyor.txt",$fileContent3,FILE_APPEND);
$fileStatus4=file_put_contents("../text_files/start_almacen.txt",$fileContent4,FILE_APPEND);
$fileStatus5=file_put_contents("../text_files/stop_almacen.txt",$fileContent5,FILE_APPEND);
$fileStatus6=file_put_contents("../text_files/automode.txt",$fileContent6,FILE_APPEND);

if($fileStatus0 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus1 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus2 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus3 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus4 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus5 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

if($fileStatus6 != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}


?>
