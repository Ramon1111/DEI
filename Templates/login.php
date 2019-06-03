<?php
  SESSION_START();
  if(isset($_POST['usuario']) && isset($_POST['contra'])){
    $link=mysqli_connect("localhost","root","","DEI");
    htmlspecialchars($_POST['usuario']);
    htmlspecialchars($_POST['contra']);
    mysqli_real_escape_string($link,$_POST['usuario']);
  	mysqli_real_escape_string($link,$_POST['contra']);

    if(!$link){
      echo "No se pudo conectar".mysqli_connect_error();
    }
    else{
      $user=$_POST['usuario'];
      $cont=$_POST['contra'];
      $arre=array();

      $query="SELECT * FROM USERS WHERE USERNAME = '".$user."' AND PASSWORD = '".$cont."'";
    	$res=mysqli_query($link, $query);

      if(!empty($res)){
        while($row=mysqli_fetch_assoc($res))
          foreach($row as $re)
            $arre[]=$re;
      }
      else{
        echo 'Error al ingresar usuario o contraseña';
      }
      mysqli_close($link);
      if(!empty($arre)){
        $_SESSION['usuario']=$arre[0];
        $_SESSION['nombre']=$arre[2];
        $_SESSION['apellido']=$arre[3];
        echo 'correcto';
      }
    }
  }
  else {
    echo 'no hay conexión';
  }
?>
