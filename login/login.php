<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrate</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="../css/themify-icons.css">
</head>
<body>
	<?php
		if(!isset($_POST['op'])){
			$comprueba_email = 0;
		}else{
			$comprueba_email = $_POST['op'];
		}
		if($comprueba_email == 1){
			?>
				<div class="container mt-5">
					<div class="alert alert-secondary">
						<strong>El correo ya existe intenta con otro</strong>
					</div>
				</div>
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				
			<?php
		}
	?>
	<form action="registrar.php" name="formulario" onsubmit="return registrar();" method="POST">
		<h2>Sumate al ahorro<span> Energético</span></h2>
		<input class="cajon" id="nombre" type="text" name="nombre" placeholder="Nombre completo" required="">
		<span id="snom" class="marcar"></span>
		<input class="cajon" id="email" type="Email" name="email" placeholder="Email" id="email">
		<span id="semail" class="marcar"></span>
		<input class="cajon" id="pass" type="password" name="pass" placeholder="Contraseña">
		<span id="spass" class="marcar"></span>
		<select name="rol" class="cajon">
			<option>Rol</option>
			<option value="cliente">Cliente</option>
			<option value="proveedor">Proveedor</option>
		</select>
		<!--<select class="cajon" name="seleccion" id="estado" >
			<option >Estado</option>
			<option >Ciudad de México</option>
			<option >Aguascalientes</option>
			<option >Baja California</option>
			<option >Baja California Sur	</option>
			<option >Campeche</option>
			<option >Coahuila de Zaragoza	</option>
			<option >Colima</option>
			<option >Chiapas</option>
			<option >Chihuahua</option>
			<option >Durango</option>
			<option >Guanajuato</option>
			<option >Guerrero</option>
			<option >Hidalgo</option>
			<option >Jalisco</option>
			<option >México</option>
			<option >Michoacán </option>
			<option >Morelos</option>
			<option >Nayarit</option>
			<option >Nuevo León	</option>
			<option >Oaxaca</option>
			<option >Puebla</option>
			<option >Querétaro</option>
			<option >Quintana Roo	</option>
			<option >San Luis Potosí	</option>
			<option >Sinaloa</option>
			<option >Sonora</option>
			<option >Tabasco</option>
			<option >Tamaulipas </option>
			<option >Tlaxcala	</option>
			<option >Veracruz</option>
			<option >Yucatán</option>
			<option >Zacatecas</option>
		</select>
		<span id="sestado" class="marcar"></span>-->
		<!--<input type="checkbox" name="acept" id="check">--> <label for="acept">Al crear tu cuenta estas aceptando los <span>terminos y condiciones</span>  de uso de la plataforma.</label>
		<span id="marcar" class="marcar"></span>
		<button id="registro">Crea tu cuenta</button>
		<!--<button id="gmail"><i class="ti-google"></i> Registrate con Gmail</button>-->
		<hr>
		<p>Ya tengo una cuenta. <a href="ingresar.php">Ingresar</a></p>
	</form>
	<script>
		function validar(){
			var nombre, email, pass, estado, exp;
			nombre = document.getElementById("nombre").value;
			email = document.getElementById("email").value;
			pass = document.getElementById("pass").value;
			estado = document.getElementById("estado").value;

			if(nombre == ""){
				document.getElementById("snom").innerHTML = "Este campo es necesario";
				return false;
			}
			/*if(nombre != ""){
				document.getElementById("snom").innerHTML = "";
				return false;
			}*/
			if(email == ""){
				document.getElementById("semail").innerHTML = "Este campo es necesario";
				return false;
			}
			/*if(email != ""){
				document.getElementById("semail").innerHTML = "";
				return false;
			}*/
			if(pass == ""){
				document.getElementById("spass").innerHTML = "Este campo es necesario";
				return false;
			}
			/*if(pass != ""){
				document.getElementById("spass").innerHTML = "";
				return false;
			}*/
			/*if(estado == ""){
				document.getElementById("sestado").innerHTML = "Este campo es necesario";
				return false;
			}*/

			var elemento = document.forms["formulario"]["acept"].checked;	
			if(elemento == false){
				document.getElementById("marcar").innerHTML = "Debes aceptar los terminos y condiciones";
				return false;
			}			

			

			
		}
	</script>
	<script src="js/jquery.min.js"></script>
</body>
</html>