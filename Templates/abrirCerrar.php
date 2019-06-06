<?php
  $value=$_POST['estado'];
  if ($value==0){
    $command = escapeshellcmd('python ../sensors/exampleOpen.py');
    //shell_exec($command);
    $newString=Shell_exec($command);
    sleep(1);
    echo $newString;
  }
  elseif($value==1){
    $command = escapeshellcmd('python ../sensors/exampleClose.py');
    $newString=shell_exec($command);
    echo $newString;
  }
?>
