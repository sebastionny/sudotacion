<?php
/**
 * This example shows how to handle a simple contact form.
 */

$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    require './scrPHP/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host = 'bh-3.webhostbox.net';
    $mail->Port = 465;
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth = true;
    $mail->Username = "sebastian@tallern.com";
    $mail->Password = "1032384604";
    $mail->SMTPSecure = 'ssl';
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Mensaje Web Su dotación ' . $_POST['email'];

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    // Este es el correo de donde se envia el mensaje. IMPORTANTE debe ser el mismo de la autenticación para evitar suplantacion de identidad.
    $mail->setFrom('info@aytexdotaciones.com', 'Su dotación infoaytexdotaciones@gmail.com ');
    // Este es el correo donde van a responder
    $mail->AddReplyTo('infoaytexdotaciones@gmail.com', 'Reply Su dotación');
    // Este es el correo destino
    $mail->addAddress('tallernait@gmail.com', '');
    //Enviar copia al corre...
    $mail->addCC( $_POST['email']);
    $mail->addCC( 'info@aytexdotaciones.com');


    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request

//comprobamos si se adjuntaron archivos, los cargamos en el servidor y los pasamos como adjuntos del email
if (isset($_FILES['archivo']['tmp_name'])) {
    $achivos_adjuntos='';                   
    $i=0;
    do  {
        if($_FILES['archivo']['tmp_name'][$i] !="") 
            { 
            $aleatorio = rand(); 
            $nuevonombre = $aleatorio.'-'.$_FILES['archivo']['name'][$i];
            copy($_FILES['archivo']['tmp_name'][$i],'archivos/'.$nuevonombre);
            $achivos_adjuntos .= '<br /><a href="'.$url.'/archivos/'.$nuevonombre.'">'.$nuevonombre.'</a></strong>';
            $mail->AddAttachment($_FILES['archivo']['tmp_name'][$i], $nuevonombre);
            }   
            $i++;
        } while ($i < $cantidad_archivos);

}

   

   //comprobamos si todos los campos fueron completados
if ($_POST['phone']!='' && $_POST['email']!='' && $_POST['nombre']!='' && $_POST['comentario']!='' && $error_archivo=='') {

$email=$_POST['email'];
$nombre=$_POST['nombre'];
$phone=$_POST['phone'];

$comentario=$_POST['comentario'];

//armamos el html
$contenido = '<html><body>';
$contenido .= '<h2>Contacto desde formulario</h2>';
$contenido .= '<p>Enviado el '.  date("d M Y").'</p>';
$contenido .= '<hr />';
$contenido .= '<p>Nombre: <strong>'.$nombre.'</strong></p>';
$contenido .= '<p>Email: <strong>'.$email.'</strong></p>';
$contenido .= '<p>Teléfono: <strong>'.$phone.'</strong></p>';
$contenido .= '<p>Comentario: <strong>'.$comentario.'</strong></p>';
$contenido .= '<hr />';
$contenido .= '<p>Archivos Adjuntos: '.$achivos_adjuntos.'</p>';
$contenido .= '<hr />';
$contenido .= '</body></html>';

$mail->Body    = $contenido;
// si todos los campos fueron completados enviamos el mail

$mail->Send();

$flag='ok';
$mensaje='<div id="ok">Tu mensaje fué enviado gracias por contactarnos. <br> <br> No dude en llamarnos para atender su solicitud lo antes posible. <br> <br> <br><h2>Bogotá: Calle 53 N. 27 a - 15 Bogotá Barrio Galerías</h2> <br>(57) (312) 369 3618 -------------- <br><br> (57)+1 721 5119 </div>';
} else {
    
//si no todos los campos fueron completados se frena el envio y avisamos al usuario 
$flag='err';
$mensaje='<div id="error"> Los Campos Marcados Con * Son Requeridos. '.$error_archivo.'</div>';

}

}
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html lang="es" class="no-js oldie"><![endif]-->
<!--[if IE 8 ]><html lang="es" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="es" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="es" class="no-js"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Contáctenos | Su Dotation. S.A.</title>
    <link  rel= "apple-touch-icon"  sizes= "57x57"  href= "/apple-icon-57x57.png" > 
    <link  rel= "apple-touch-icon"  sizes= "60x60"  href= "/apple-icon-60x60.png" > 
    <link  rel= "apple-touch-icon"  sizes= "72x72"  href= "/apple-icon-72x72.png" > 
    <link  rel= "apple-touch-icon"  sizes= "76x76"  href= "/apple-icon-76x76.png" > 
    <link  rel= "apple-touch-icon"  sizes= "114x114"  href= "/apple-icon-114x114.png" > 
    <link  rel= "apple-touch-icon"  sizes= "120x120"  href= "/apple-icon-120x120.png" > 
    <link  rel= "apple-touch-icon"  sizes= "144x144"  href= "/apple-icon-144x144.png" > 
    <link  rel= "apple-touch-icon"  sizes= "152x152"  href= "/apple-icon-152x152.png" > 
    <link  rel= "apple-touch-icon"  sizes= "180x180"  href= "/apple-icon-180x180.png" > 
    <link  rel= "icon"  type= "image/png"  sizes= "192x192"   href= "/android-icon-192x192.png" > 
    <link  rel= "icon"  type= "image/png"  sizes= "32x32"  href= "/favicon-32x32.png" > 
    <link  rel= "icon"  type= "image/png"  sizes= "96x96"  href= "/favicon-96x96.png" > 
    <link  rel= "icon"  type= "image/png"  sizes= "16x16"  href= "/favicon-16x16.png" > 
    <meta  name= "msapplication-TileColor"  content= "#ffffff" > 
    <meta  name= "msapplication-TileImage"  content= "/ms-icon-144x144.png" > 
    <meta  name= "theme-color"  content= "#ffffff" >

    <meta name="description" content="Contacto, *************************,">
    <meta name="keywords" content="direcciones, ***************">

    <!-- Core CSS -->
    <link href="scrPHP/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="scrPHP/style.css" media="screen" rel="stylesheet" type="text/css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="scrPHP/css/animate.css">

    <!-- Custom CSS -->
    <link href="scrPHP/custom.css" media="screen" rel="stylesheet" type="text/css">

    <!-- Modernizr Library -->
    <script src="scrPHP/js/libs/modernizr.min.js"></script>

    

    
</head>

<body>

          <!-- Contact -->
        <section class="main-row" style=" padding: 0px!important;">
            <div class="container" style=" width: 100%!important;">
                <div class="row">
                    <!-- Content -->
                    <div id="primary" class="col-sm-4 content-area">

                           <div id="form"  class="Formulario video" >
                                    

                            <?php echo $mensaje; /*mostramos el estado de envio del form */ ?>

                            <?php if($cantidad_archivos > 1) {$plural='s';} else {$plural='';} ?>

                            <?php if ($flag!='ok') { ?>
                            <form action="<?php echo $PHP_SELF;?>" method="post" enctype="multipart/form-data" class="Formulario video">
                                <p>Nombre *<br />
                                <input size="40" placeholder="" <?php if (isset ($flag) && $_POST['nombre']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="nombre" value="<?php echo $_POST['nombre'];?>" /></p>
                                
                                <p>Email*<br />
                                <input size="40" placeholder="" <?php if (isset ($flag) && $_POST['email']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="email"  value="<?php echo $_POST['email'];?>" /></p>

                                <p>Teléfono*<br />
                                <input size="40" placeholder="" <?php if (isset ($flag) && $_POST['phone']=='') { echo 'class="error"';} else {echo 'class="campo"';} ?> type="text" name="phone"  value="<?php echo $_POST['phone'];?>" /></p>

                                <p>Archivo<br />
                                <input type="file" class="multi max-<?=$cantidad_archivos?>" name="archivo[]" value="<?=$_FILES['archivos']?>" id="archi"></p>
                
                                    
                                <p>Mensaje*<br />
                                <textarea style="height: 120px!important;" placeholder=""  cols="50"  rows="8"<?php if (isset ($flag) && $_POST['comentario']=='') { echo 'class="com-error"';} else {echo 'class="com"';} ?> name="comentario"><?php echo $_POST['comentario'];?></textarea></p>
                                <p><input class="boton" type="submit" name="enviar" value="Enviar" /></p>
                                </form>
                            <?php } ?>
                
                            </div> <!-- end form-->
                    </div>
                    <!--/ Content -->

<!-- Libs -->
<script src="scrPHP/js/libs/jquery-1.11.0.min.js"></script>
<script src="scrPHP/js/libs/jquery-ui-1.10.4.min.js"></script>
<script src="scrPHP/js/libs/bootstrap.min.js"></script>
<!--[if lt IE 9]><script src="js/libs/respond.min.js"></script><![endif]-->

<!-- Responsive Menu, Animated Dropdown -->
<script src="scrPHP/js/jquery.slicknav.min.js"></script>

<!-- CarouFredSel -->
<script src="scrPHP/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="scrPHP/js/jquery.touchSwipe.min.js"></script>

<!-- Placeholders -->
<script src="scrPHP/js/jquery.powerful-placeholder.min.js"></script>

<!-- Styled Select -->
<script src="scrPHP/js/cusel.min.js"></script>

<!-- gMap -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="scrPHP/js/jquery.gmap.min.js"></script>

<!-- General Scripts -->
<script src="scrPHP/js/general.js"></script>
<script src="scrPHP/js/html5form-min.js"></script>

</body>
</html>
