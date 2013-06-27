<?php 
//ejemplo de login


//funcion para crear login de esta funcion espero que saques lo que necesitas.

 function login()

                 {

                 //recatamos los datos via post que provienen de nuestro form y los guardamos en variables para hacer una consulta mas limpia.
                    $user=$_POST["user"];
                    $pass=$_POST["pass"];

                    //con este "echo" probamos que los datos ingresado en los campos se estan recibiendo bien = echo " usuario =$user <br> password_js= $pass_js <br> password_php= $pass_php";

                     $sql="select * from user where user='$user' and pass = '$pass'"; //consulta guarda en variable.

                     $res=mysql_query($sql,Conectar::con()); //aqui query a nuestra bd.

                        if (mysql_num_rows($res)==0) { //aqui preguntamos si los datos de nustra consulta son igual a 0 se cumple el cofigo de abajo.

                                  //si no existe el user hacenos un redirecionamiento.

                                   echo "<script type='text/javascript'>

                                       alert('El usuario no existe en la base de datos');
                                       window.location='login.php';

                                     </script>";

                                 

                              }else{

                                  //aqui rrecoremos los campos de nuestra consulta y la guardamos en variable reg.

                                if ($reg=mysql_fetch_array($res)) {



                                 $_SESSION["session_user"]=$reg["id_user"];//creamos la session pasandole id de la bd.

                                  header("location:logeado.php");//hacemos un redirecionamiento a la pagina que queremos que el user visite
                                }
                              }


                 }
?>
