<?php
  $value=$_POST['estado'];
  if ($value==0){
    $command = escapeshellcmd('python ../sensors/openDoor1.py');
    shell_exec($command);
    //$newString=exec(testSendN.py);
    echo 'Puerta abierta';
  }
  elseif($value==1){
    $command = escapeshellcmd('python ../sensors/closeDoor1.py');
    shell_exec($command);
    echo 'Puerta cerrada';
  }
?>
