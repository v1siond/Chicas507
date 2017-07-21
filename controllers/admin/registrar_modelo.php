<?php session_start();
  ob_start();
  require '../../routes/routes.php';
  require '../../models/functions.php';
  require '../../schema/database.php';

  $conexion = conexion($db_config);
  sesion();
  $provincias = array('Provincia de Bocas del Toro',
    'Provincia de Coclé',
    'Provincia de Colón',
    'Provincia de Chiriquí',
    'Provincia de Darién',
    'Provincia de Herrera',
    'Provincia de Los Santos',
    'Provincia de Panamá',
    'Provincia de Veraguas',
    'Provincia de Panamá Oeste'
    );
  $idiomas = obtener_idioma($conexion);
  $distritos = obtener_distrito($conexion);
  $servicios = obtener_servicios($conexion);
  $nacionalidades = obtener_nacionalidad($conexion);
  $edades = array(18,19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45);
  $alturas = array(145,146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186);
  $colores_cabello = array('negro', 'rubio', 'rojo', 'castaño', 'verde', 'azul', 'morado');
  $colores_ojos = array('marrones', 'verdes', 'azules', 'morados', 'amarillos', 'negros', 'grises');
  $colores_piel = array('blanca', 'trigueña', 'morena', 'negra');
  $tamaño_pechos = array('32 a', '32 b', '32 c', '34 a', '34 b', '34 c','36 a', '36 b', '36 c','36 d', '38 a', '38 b','38 c', '38 d', '40 a', '40 b', '40 c', '40 d');
  $tarifas = array(100, 150, 200, 250, 300, 350, 400, 450, 500);
  $orientaciones = array('heterosexual', 'homosexual', 'bisexual', 'otro');
  $dias_atencion = array('lunes a viernes', 'fines de semana', 'todos los días', 'varía');
  $horarios = array('6:00pm a 12:00am', '12:00m a 6:00pm', '3:00pm a 9:00pm', '24 horas' , 'varía');
  $responde = array('si', 'no');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $user_new = array(
        filter_var($_POST['bio']),
        filter_var($_POST['presentation']),
        filter_var($_POST['email']),
        filter_var($_POST['name']),
        filter_var($_POST['phone']),
        filter_var($_POST['province']),
        filter_var($_POST['zone']),
        filter_var($_POST['nacionalidad']),
        filter_var($_POST['edad']),
        filter_var($_POST['altura']),
        filter_var($_POST['color_pelo']),
        filter_var($_POST['color_ojos']),
        filter_var($_POST['color_piel']),
        filter_var($_POST['pechos']),
        filter_var($_POST['tarifa']),
        filter_var($_POST['tarifa_dos']),
        filter_var($_POST['tarifa_cuatro']),
        filter_var($_POST['tarifa_ocho']),
        filter_var($_POST['tarifa_noche']),
        filter_var($_POST['sexualidad']),
        filter_var($_POST['dias_atencion']),
        filter_var($_POST['horario']),
        filter_var($_POST['status']),
        filter_var($_POST['operaciones'])
      );
      $service = $_POST['servicio'];
      $idioma = $_POST['idioma'];
      $cont = 0;
      $error = '';
      foreach ($user_new as $key) {

        if(empty($user_new[$cont]) || $user_new[$cont] == '' || $user_new[$cont] == null){
          echo '<script language="javascript">alert("Debe Llenar todos los campos");</script>';
          $error .='No rellenó todos los campos';
        }

        $cont++;
      }

      $cont = 0;

      if (!isset($service)) {
        echo '<script language="javascript">alert("Debe Llenar todos los campos");</script>';
        $error .='No rellenó todos los campos';
      }


      if ($error == '') {
        $statement = $conexion->prepare('INSERT INTO modelo (codigo, biografia, presentacion,
                                        email, nombre_model, telefono, provincia, zona, nacionalidad,
                                        edad, altura, color_cabello, color_ojos, color_piel, pechos,
                                        precio_hora, precio_dos_horas, precio_cuatro_horas, precio_ocho_horas,
                                        precio_noche, orientacion, dias_atencion, horario, status, operacion )
          VALUES (null, :bio, :presentation, :email, :name, :phone, :province, :zone, :nacionalidad, :edad, :altura,
                  :color_pelo, :color_ojos, :color_piel, :pechos, :tarifa, :tarifa_dos, :tarifa_cuatro, :tarifa_ocho, :tarifa_noche,
                  :sexualidad, :dias_atencion, :horario, :status, :operaciones )');

        $statement->execute(array(
          ':bio' => $user_new[0],
          ':presentation' => $user_new[1],
          ':email' => $user_new[2],
          ':name' => $user_new[3],
          ':phone' => $user_new[4],
          ':province' => $user_new[5],
          ':zone' => $user_new[6],
          ':nacionalidad' => $user_new[7],
          ':edad' => $user_new[8],
          ':altura' => $user_new[9],
          ':color_pelo' => $user_new[10],
          ':color_ojos' => $user_new[11],
          ':color_piel' => $user_new[12],
          ':pechos' => $user_new[13],
          ':tarifa' => $user_new[14],
          ':tarifa_dos' => $user_new[15],
          ':tarifa_cuatro' => $user_new[16],
          ':tarifa_ocho' => $user_new[17],
          ':tarifa_noche' => $user_new[18],
          ':sexualidad' => $user_new[19],
          ':dias_atencion' => $user_new[20],
          ':horario' => $user_new[21],
          ':status' => $user_new[22],
          ':operaciones' => $user_new[23]
          ));
        $servicios = obtener_servicios($conexion);
        $modelo = obtener_modelo_last($conexion);
        $model_id = $modelo[0]['codigo'];
        $cont = 0;

        foreach ($idiomas as $idio) {
          $check = 0;
          foreach ($idioma as $lengua) {
            if ($idio['id_idioma'] == $lengua[$cont]) {
              $check = $lengua[$cont];
              $idioma_g = $conexion->prepare('INSERT INTO idioma_modelo (id_model_l, idio, model) VALUES (null, :idioma, :model)');
              $idioma_g->execute(array(
                ':model' => $model_id,
                ':idioma' => $lengua[$cont]
              ));
              $error_s = $idioma_g->errorInfo();

              foreach ($error_s as $error_se) {
                if(empty($error_se)){
                }elseif ($error_se == 0) {
                }else{
                  echo '<script language="javascript">alert(" ' . $error_se . ' ");</script>';
                }
              }
            }
          }
        }
        $cont = 0;
        foreach ($servicios as $servi) {
          $check = 0;
          foreach ($service as $serv) {
            if ($servi['id_serv'] == $serv[$cont]) {
              $check = $serv[$cont];
              $servicio_g = $conexion->prepare('INSERT INTO servs_modelo (id, model, servs) VALUES (null, :model, :serv)');
              $servicio_g->execute(array(
                ':model' => $model_id,
                ':serv' => $serv[$cont]
              ));
              $error_s = $servicio_g->errorInfo();

              foreach ($error_s as $error_se) {
                if(empty($error_se)){
                }elseif ($error_se == 0) {
                }else{
                  echo '<script language="javascript">alert(" ' . $error_se . ' ");</script>';
                }
              }
            }
          }
        }

        $errores = $statement->errorInfo();

        foreach ($errores as $errore) {
          if(empty($errore)){
            header('Refresh: 1; url=http://www.chicas507.com/exito.php');
          }elseif ($errore == 0) {
          }else{
            echo '<script language="javascript">alert(" ' . $errore . ' ");</script>';
          }
        }
      }else{
        $error .='<script language="javascript">alert("Datos Incorrectos!");</script>';
      }
    }

  require '../../views/admin/registrar_modelo.php';
  ob_end_flush();
?>