<?php
$nombre = $_POST['name'];
$email = $_POST['email'];
$mensaje = $_POST['message'];
$para = 'israel-villalobos@hotmail.com';
$titulo = 'TjMed-Contacto';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://TUSITIOWEB.COM';
</script>";
} else {
echo 'Falló el envio';
}
}
?>
