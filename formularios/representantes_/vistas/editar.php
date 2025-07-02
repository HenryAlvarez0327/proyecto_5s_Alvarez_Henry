<?php
    require_once('../php/modelo.php');
    $obj= new clase_representantes();
    $row=$obj->_consultarcodigo($_GET['valor']);
    $fila=$row->fetch();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualización de datos representante</title>
        <link href="../../../Libs/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../../Libs/bootstrap-5.3.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../../Libs/jquery.min.js"></script>
        <script src="../../../Libs/ajax.js"></script>
    </head>
<body>
<form action="../php/actualizar_representantes.php" method="post">
    <input type="hidden" id="txt_codigo" name="txt_codigo" value="<?php echo $fila['REP_CODIGO']; ?>"> 
    <div>
        <h2 class="text-primary">Actualizar Representante</h2>
    </div>
    <div class="container">

        <div class="form-group row">
            <label><b>Cédula</b></label>
            <input type="text" class="form-control" name="txt_cedula" value="<?php echo $fila['REP_CEDULA']; ?>" required>
        </div>

        <div class="form-group row">
            <label><b>Apellidos y Nombres</b></label>
            <input type="text" class="form-control" name="txt_apenom" value="<?php echo $fila['REP_APENOM']; ?>" required>
        </div>

        <div class="form-group row">
            <label><b>Fecha de Nacimiento</b></label>
            <input type="date" class="form-control" name="txt_fecnac" value="<?php echo $fila['REP_FECNAC']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Sexo</b></label><br>
            <input type="radio" name="rad_sexo" value="1" <?php if($fila['REP_SEXO'] == 1) echo "checked"; ?>> Masculino
            <input type="radio" name="rad_sexo" value="2" <?php if($fila['REP_SEXO'] == 2) echo "checked"; ?>> Femenino
        </div>

        <div class="form-group row">
            <label><b>Estado Civil</b></label>
            <select class="form-control" name="txt_estciv">
                <option value="1" <?php if($fila['REP_ESTCIV'] == 1) echo "selected"; ?>>Casada(o)</option>
                <option value="2" <?php if($fila['REP_ESTCIV'] == 2) echo "selected"; ?>>Soltera(o)</option>
                <option value="3" <?php if($fila['REP_ESTCIV'] == 3) echo "selected"; ?>>Divorciada(o)</option>
                <option value="4" <?php if($fila['REP_ESTCIV'] == 4) echo "selected"; ?>>Viuda(o)</option>
                <option value="5" <?php if($fila['REP_ESTCIV'] == 5) echo "selected"; ?>>Unión Libre</option>
            </select>
        </div>

        <div class="form-group row">
            <label><b>Dirección Domiciliaria</b></label>
            <input type="text" class="form-control" name="txt_domici" value="<?php echo $fila['REP_DOMICI']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Teléfono Domicilio</b></label>
            <input type="text" class="form-control" name="txt_teldom" value="<?php echo $fila['REP_TELDOM']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Trabajo</b></label>
            <input type="text" class="form-control" name="txt_trabaj" value="<?php echo $fila['REP_TRABAJ']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Dirección del Trabajo</b></label>
            <input type="text" class="form-control" name="txt_dirtra" value="<?php echo $fila['REP_DIRTRA']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Teléfono del Trabajo</b></label>
            <input type="text" class="form-control" name="txt_teltra" value="<?php echo $fila['REP_TELTRA']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Profesión</b></label>
            <input type="text" class="form-control" name="txt_profes" value="<?php echo $fila['REP_PROFES']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Fecha de Ingreso</b></label>
            <input type="date" class="form-control" name="txt_fecing" value="<?php echo $fila['REP_FECING']; ?>">
        </div>

            <!-- Suspendido -->
                <div class="form-group row">
                    <label class="col-12">¿Suspendido?</label>
                    <select class="form-control" name="txt_suspen">
                        <option value="0" <?= $fila['REP_SUSPEN'] == 0 ? 'selected' : '' ?>>No</option>
                        <option value="1" <?= $fila['REP_SUSPEN'] == 1 ? 'selected' : '' ?>>Sí</option>
                    </select>
                </div>
        <div class="form-group row">
            <label><b>Nacionalidad</b></label>
            <input type="text" class="form-control" name="txt_nacion" value="<?php echo $fila['REP_NACION']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Correo</b></label>
            <input type="email" class="form-control" name="txt_correo" value="<?php echo $fila['REP_CORREO']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Celular / WhatsApp</b></label>
            <input type="text" class="form-control" name="txt_movilw" value="<?php echo $fila['REP_MOVILW']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Contacto Alterno</b></label>
            <input type="text" class="form-control" name="txt_contac" value="<?php echo $fila['REP_CONTAC']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Teléfono de Contacto</b></label>
            <input type="text" class="form-control" name="txt_telcon" value="<?php echo $fila['REP_TELCON']; ?>">
        </div>

        <div class="form-group row">
            <label><b>Observaciones</b></label>
            <textarea class="form-control" name="txt_observ"><?php echo $fila['REP_OBSERV']; ?></textarea>
        </div>

        <div class="form-group row text-center">
            <br>
            <button type="submit" class="btn btn-success">Actualizar Registro</button>
        </div>

    </div>
</form>
</body>
</html>

