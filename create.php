<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("clsempleado.php");
				$clientes = new clsempleado();
				if(isset($_POST) && !empty($_POST)){
					$DocIdent = $clientes->sanitize($_POST['DocIdent']);
					$Apellidos = $clientes->sanitize($_POST['Apellidos']);
					$Nombres = $clientes->sanitize($_POST['Nombres']);
					$FechaIngreso = $clientes->sanitize($_POST['FechaIngreso']);
					$Cargo = $clientes->sanitize($_POST['Cargo']);
					$Salario = $clientes->sanitize($_POST['Salario']);
					
					
					$res = $clientes->create($DocIdent, $Apellidos, $Nombres, $FechaIngreso, $Cargo, $Salario);
					if ($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudo insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post" id="empleado">
				<div class="col-md-6">
					<label>Identificacion:</label>
					<input type="text" name="DocIdent" id="DocIdent" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="Apellidos" id="Apellidos" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="Nombres" id="Nombres" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>FechaIngreso:</label>
					<input type="date" name="FechaIngreso" id="FechaIngreso" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
				<br>
                    <label for="cargos">Escoja el Cargo:</label>
                    <select id="Cargo" name="Cargo" form="empleado">
                    <option value="Coordinador">Coordinador</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Operario">Operario</option>
                    </select>
				</div>
				<div class="col-md-6">
					<label>Salario:</label>
					<input type="text" name="Salario" id="Salario" class='form-control' maxlength="100" required>
				</div>
				
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            