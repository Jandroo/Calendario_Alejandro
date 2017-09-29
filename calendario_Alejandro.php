<?php

# definimos los valores iniciales para nuestro calendario

$mes=date("n");
$año=date("Y");
$diaActual=date("j");

# Obtenemos el dia de la semana del primer dia

# Devuelve 0 para domingo, 6 para sabado

$diaSemana=date("w",mktime(0,0,0,$mes,1,$año));

# Obtenemos el ultimo dia del mes

$ultimoDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$año)-1));

 

$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

?>

<!DOCTYPE html>

<html lang="es">

<head>

	<title>Calendario_Alejandro</title>

	<meta charset="utf-8">

	<style>

		h1 {

			text-align: center;
		}


		#calendar {

			font-family:Arial;
			text-align: center;
			font-size:14px;
			margin: 0 auto;
			border: 2px solid black;

		}

		#calendar caption {

			text-align:center;
			padding:5px 10px;
			background-color: black;
			color:#fff;
			font-weight:bold;
			height: 20px;

		}

		#calendar th {

			background-color: #f1c40f;
			color:black;
			width:100px;
			height: 20px;

		}

		#calendar td {

			text-align:right;
			padding:2px 5px;
			background-color:  #f7dc6f;
			height: 50px;

		}

		#calendar .hoy {

			background-color:black;
			color:#f1c40f;

		}

	</style>

</head>


<body>

<h1><i>CALENDARIO</i></h1>

<table id="calendar">

	<caption><?php echo $meses[$mes]." de ".$año?></caption>

	<tr>
		<th>Lun</th>
		<th>Mar</th>
		<th>Mie</th>
		<th>Jue</th>
		<th>Vie</th>
		<th>Sab</th>
		<th>Dom</th>
	</tr>

	<tr bgcolor="silver">

		<?php

		$ultima_celda=$diaSemana+$ultimoDiaMes;

		// hacemos un bucle hasta 42, que es el máximo de valores que puede

		// haber... 6 columnas de 7 dias

		for($i=1;$i<=35;$i++){

			if($i==$diaSemana){

				// determinamos en que dia empieza
				$dia=1;

			}

			if($i<$diaSemana || $i>=$ultima_celda){

				// celda vacia
				echo "<td>&nbsp;</td>";

			}

			else{

				// mostramos el dia
				if($dia==$diaActual)

					echo "<td class='hoy'>$dia</td>";

				else

					echo "<td>$dia</td>";

				$dia++;
			}

			// cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)

			{
				echo "</tr><tr>\n";

			}

		}

	?>

	</tr>

</table>

</body>

</html>