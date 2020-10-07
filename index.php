<?php
    session_start();
    if (isset($_POST['busqueda']))
    {
        $_SESSION['xbusqueda'] = $_POST['busqueda'];
    }       
?>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script>
    function confirmacion(idreg)
    {
        if(confirm('Esta seguro que desea eliminar el registro?'))
        {
            location.href='delete.php?id='+idreg;
        }
    }
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Actualización de  <b>Clientes</b></h2></div>
                    <form method="post">
                        <input type="text" id="busqueda" name="busqueda" 
                        placeholder="Ingrese el dato a buscar" value = "<?php echo $_SESSION['xbusqueda'];?>">
                    </form>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar</a>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>DocIdent</th>
                        <th>Nombres</th>
                        <th>FechaIngreso</th>
						<th>Cargo</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
				<?php 
                    include ('clsempleado.php');
                    $empleados = new clsempleado();//Instanciar el objeto clientes de la clase Database
                    $listado = $empleados->read();
                    if (isset($_POST['busqueda']))
                    {
                        if ($_POST['busqueda'] != null)
                        {
                            $listado = $empleados->find($_POST['busqueda']);
                        }
                    }
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$DocIdent=$row->DocIdent;
						$nombres=$row->Nombres." ".$row->Apellidos;
						$fechaingreso=$row->FechaIngreso;
						$cargo=$row->Cargo;
						$salario=$row->Salario;
				?>
					<tr>
                        <td><?php echo $DocIdent;?></td>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $fechaingreso;?></td>
                        <td><?php echo $cargo;?></td>
						<td><?php echo $salario;?></td>
                        <td>
						    <a href="update.php?DocIdent=<?php echo $DocIdent;?>" class="edit" title="Actualizar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" onClick="confirmacion(<?php echo $id; ?>)" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>
                    
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            