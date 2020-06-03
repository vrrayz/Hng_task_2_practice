<?php

$files = scandir('./scripts'); $file_format = ''; $output_string = '';
for ($i=0; $i <count($files) ; $i++) { 
    # code...
    $file_format = explode('.', $files[$i])[1];
    if($files[$i] == '.' || $files[$i] == '..'){
        continue;
    }else if($file_format == "js"){
        $output_string = exec('node ./scripts/'.$files[$i]);
        checkFile($output_string,$files[$i]);
    }else if ($file_format == 'php') {
        $output_string = exec('php ./scripts/' . $files[$i]);
        checkFile($output_string, $files[$i]);
    }else if ($file_format == 'py') {
        $output_string = exec('python ./scripts/' . $files[$i]);
        checkFile($output_string, $files[$i]);
    }else{
        echo "Error with File - <b>".$files[$i]."</b> - format not supported<br/>";
    }
}
function checkFile($string,$file){
    $reg_exp = preg_match('/^Hello\sWorld[,|.|!]*\sthis\sis\s[a-zA-Z]{2,}\s[a-zA-Z]{2,}(\s[a-zA-Z]{2,})?\swith\sHNGi7\sID\s(HNG-\d{3,})\susing\s[a-zA-Z]{3,}\sfor\sstage\s2\stask.?$/i', trim($string));
    if ($reg_exp == 1) {
        echo "Pass " . $file . "<br/>";
    } else {
        echo "Fail " . $file . "<br/>";
    }
}

?>