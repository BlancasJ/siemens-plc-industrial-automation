<?php

$val = $_GET["data"];
//$val1 = $_GET["data1"];
//$val2 = $_GET["data2"];

$fileContent=$val."\n";
//$fileContent1=$val1."\n";
//$fileContent2=$val2."\n";

$fileStatus=file_put_contents("datastorage.txt",$fileContent,FILE_APPEND);
//$fileStatus1=file_put_contents("datastorage.txt",$fileContent1,FILE_APPEND);
//$fileStatus2=file_put_contents("datastorage.txt",$fileContent2,FILE_APPEND);

if($fileStatus != false)

{

                echo  "SUCCESS. Data written in file.";

}

else

{

                echo  "FAIL. Could not connect to file.";

}

/*
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
*/

?>