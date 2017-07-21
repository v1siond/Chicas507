<?php session_start();
  ob_start();
  require '../../routes/routes.php';
  require '../../models/functions.php';
  require '../../schema/database.php';

  $conexion = conexion($db_config);
  sesion();

  $usuario = $_SESSION['user'];
  $id_model = articulo($_GET['id']);
  $modelo = review_model($conexion, $id_model);
  $model = $modelo[0];
  $servicios = obtener_servicios_galeria($conexion);
  $fotos_model = review_fotos($conexion, $id_model);
  $videos_model = review_video($conexion, $id_model);
  $adm = obtener_admin($conexion, $usuario);

  if (!$adm) {
    header('Location: ' . route_admin);
  }

  $id = $id_model;
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
  $operaciones = array('pechos',
    'nalgas',
    'cara',
    'ninguna'
    );
  $distritos = obtener_distrito($conexion);
  $servicios = obtener_servicios($conexion);
  $servs_model = obtener_servicios_model($conexion, $id);
  $idiomas = obtener_idioma($conexion);
  $idiomas_model = obtener_idioma_model($conexion, $id);
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
    $user_id = $_POST['codigo'];
    if(isset($_POST["anuncio"])){
      if (isset($_POST["servicio"])) {
        $service = $_POST['servicio'];
      }

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

      $user_guardado = array(
        $model['biografia'],
        $model['presentacion'],
        $model['email'],
        $model['nombre_model'],
        $model['telefono'],
        $model['provincia'],
        $model['zona'],
        $model['nacionalidad'],
        $model['edad'],
        $model['altura'],
        $model['color_cabello'],
        $model['color_ojos'],
        $model['color_piel'],
        $model['pechos'],
        $model['precio_hora'],
        $model['precio_dos_horas'],
        $model['precio_cuatro_horas'],
        $model['precio_ocho_horas'],
        $model['precio_noche'],
        $model['orientacion'],
        $model['dias_atencion'],
        $model['horario'],
        $model['status'],
        $model['operacion']
      );

      $cont = 0;
      foreach ($user_new as $key) {

        if(empty($user_new[$cont]) || $user_new[$cont] == '' || $user_new[$cont] == $user_guardado[$cont]){
          $user_new[$cont] = $user_guardado[$cont];
        }

        $cont++;
      }

      $error = '';

      $cont = 0;
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
        $statement = $conexion->prepare('UPDATE modelo SET
          biografia = :bio,
          presentacion = :presentation,
          email = :email,
          nombre_model = :name,
          telefono = :phone,
          provincia = :province,
          zona = :zone,
          nacionalidad = :nacionalidad,
          edad = :edad,
          altura = :altura,
          color_cabello = :color_pelo,
          color_ojos = :color_ojos,
          color_piel = :color_piel,
          pechos = :pechos,
          precio_hora = :tarifa,
          precio_dos_horas = :tarifa_dos,
          precio_cuatro_horas = :tarifa_cuatro,
          precio_ocho_horas = :tarifa_ocho,
          precio_noche = :tarifa_noche,
          orientacion = :sexualidad,
          dias_atencion = :dias_atencion,
          horario = :horario,
          status = :status,
          operacion = :operaciones
          WHERE codigo = :id');

        $statement->execute(array(
          ':id' => $user_id,
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
        $servs_model = obtener_servicios_model($conexion, $user_id);
        $idiomas = obtener_idioma($conexion);
        $idiomas_model = obtener_idioma_model($conexion, $user_id);
        $service = $_POST['servicio'];
        $idioma = $_POST['idioma'];
        $cont = 0;


        foreach ($idiomas as $idio) {
          $check = 0;
          foreach ($idioma as $lengua) {
            $control = 0;

            if ($idio['id_idioma'] == $lengua) {
              $check = $lengua;
              foreach ($idiomas_model as $key) {
                if ($key['idio'] == $lengua) {
                  $control = $lengua;
                }
              }
              if ($control != $lengua) {
                $idioma_g = $conexion->prepare('INSERT INTO idioma_modelo (id_model_l, idio, model) VALUES (null, :idioma, :model)');
                $idioma_g->execute(array(
                  ':model' => $user_id,
                  ':idioma' => $lengua
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
          if ($check == 0) {
            $uncheck = $idio['id_idioma'];
            foreach ($idiomas_model as $key) {
              if ($key['idio'] == $uncheck) {
                $idioma_d = $conexion->prepare('DELETE FROM idioma_modelo WHERE model = :model AND idio = :idioma');
                $idioma_d->execute(array(
                  ':model' => $user_id,
                  ':idioma' => $uncheck
                ));
                $error_d = $idioma_d->errorInfo();

                foreach ($error_d as $error_de) {
                  if(empty($error_de)){
                  }elseif ($error_de == 0) {
                  }else{
                    echo '<script language="javascript">alert(" ' . $error_de . ' ");</script>';
                  }
                }
              }
            }
          }
        }

        foreach ($servicios as $servi) {
          $check = 0;
          foreach ($service as $serv) {
            $control = 0;

            if ($servi['id_serv'] == $serv) {
              $check = $serv;
              foreach ($servs_model as $key) {
                if ($key['servs'] == $serv) {
                  $control = $serv;
                }
              }
              if ($control != $serv) {
                $servicio_g = $conexion->prepare('INSERT INTO servs_modelo (id, model, servs) VALUES (null, :model, :serv)');
                $servicio_g->execute(array(
                  ':model' => $user_id,
                  ':serv' => $serv
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
          if ($check == 0) {
            $uncheck = $servi['id_serv'];
            foreach ($servs_model as $key) {
              if ($key['servs'] == $uncheck) {
                $servicio_d = $conexion->prepare('DELETE FROM servs_modelo WHERE model = :model AND servs = :serv');
                $servicio_d->execute(array(
                  ':model' => $user_id,
                  ':serv' => $uncheck
                ));
                $error_d = $servicio_d->errorInfo();

                foreach ($error_d as $error_de) {
                  if(empty($error_de)){
                  }elseif ($error_de == 0) {
                  }else{
                    echo '<script language="javascript">alert(" ' . $error_de . ' ");</script>';
                  }
                }
              }
            }
          }
        }

        $errores = $statement->errorInfo();

        foreach ($errores as $errore) {
          if(empty($errore)){
            $errore = 'Modelo actualizada exitosamente';
            header('Refresh: 3;url=' . route_ver_modelo_admin . '?id=' . $user_id);
          }elseif ($errore == 0) {
          }else{
            echo '<script language="javascript">alert(" ' . $errore . ' ");</script>';
          }
        }
      }else{
        $error .='<script language="javascript">alert("Datos Incorrectos!");</script>';
      }
    }

    if(isset($_POST["imagen"])){

      $c = 0;
      $img = [];

      foreach($_FILES['img']['tmp_name'] as $key => $tmp_name ){

        $file_tmp = @getimagesize($_FILES['img']['tmp_name'][$key]);
        if (!empty($file_tmp)) {

          $carpeta_destino = '../../assets/images/';
          $archivo_subido = $carpeta_destino . $_FILES['img']['name'][$key];
          move_uploaded_file($_FILES['img']['tmp_name'][$key], $archivo_subido);
          $img[$c] = $_FILES['img']['name'][$key];
          $guardado = $conexion->prepare('INSERT INTO fotos_modelo (id_foto, foto, modelo) VALUES (null, :foto, :id)');

          $guardado->execute(array(
            ':foto' => $img[$c],
            ':id' => $user_id
            ));
        }else {
          echo '<script language="javascript">alert("Formato de Archivo No Soportado");</script>';
          header('Refresh: 1; url=' . route_ver_modelo_admin . '?id=' . $user_id);
        }
        $c++;
      }
      $error = $guardado->errorInfo();
      foreach ($error as $errore) {
        if(empty($errores)){
          $errore = 'Imagen subida exitosamente';
          header('Refresh: 3;url=' . route_ver_modelo_admin . '?id=' . $user_id);
          $error = '';
        }else{
          echo $errore;
        }
      }
    }

    if(isset($_POST["video"])){
      $limite_video = obtener_video_upload($conexion, $id);
      extract($_POST);

      $video = '';

      $carpeta_destino = '../../assets/videos/';

      $archivo_subido = $carpeta_destino . basename($_FILES['video']['name']);

      $type = pathinfo($archivo_subido, PATHINFO_EXTENSION);

      if ($type != 'mp4' && $type != 'flv' && $type != 'webm' && $type != 'ogg' && $type != '3gp') {
        echo '<script language="javascript">alert("Formato de Archivo No Soportado");</script>';
        header('Refresh: 1; url=' . route_admin);
      }else{
        $video = $_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'], $archivo_subido);
        $guardado = $conexion->prepare('INSERT INTO video_modelo (id_video, video, modelo_video) VALUES (null, :video, :id)');

        $guardado->execute(array(
          ':video' => $video,
          ':id' => $user_id
          ));
        if (isset($guardado)) {
          $error = $guardado->errorInfo();
          foreach ($error as $errore) {
            if(empty($errore)){
              $errore = 'Video subido exitosamente';
              header('Refresh: 3;url=' . route_ver_modelo_admin . '?id=' . $user_id);
              $error = '';
            }else{
              echo $errore;
            }
          }
        }
      }
    }

  }

  require '../../views/admin/ver_modelo.php';
  ob_end_flush();
?>