<?php
class Edad{
	private $nacimiento;
	private $actual;
	private $fin;
	
	
	    public function inicializar($nacimiento,$actual){
			$this->nacimiento = $nacimiento;
			$this->actual = $actual;
		
		}

		public function conectarBD(){
            $con = mysqli_connect("localhost","root","","Progreso") 
            or die ("Problemas con la base de datos");
			return $con;
		}


		public function insertarEdad(){
				
			$nacimiento= $this->nacimiento;
			$actual=$this->actual;
			$ano = substr($nacimiento, -10, 4);
			$mes = substr($nacimiento, -5, 2);
			$dia = substr($nacimiento, -2, 2);
			$futura = ($ano+80).'/'.$mes.'/'.$dia;

		mysqli_query($this->conectarBD(),"UPDATE  edad  SET nacimiento='$nacimiento', actual='$actual', fut='$futura' WHERE id = 2");

		}

		public function operacion(){
			$a = mysqli_query($this->conectarBD(), "SELECT *
			from edad
			where id = 2");
			$mf=mysqli_fetch_array($a);
			$nacimiento= $mf['nacimiento'];
			$actual= $mf['actual'];
			$futura= $mf['fut'];
	
			
			$fecha11 = new DateTime($nacimiento);
			$fecha22 = new DateTime($actual);
			$fecha2 = $fecha11->diff($fecha22);
			printf('Tu as vivido  %d años, %d meses, %d días' , $fecha2->y, $fecha2->m, $fecha2->d);
			echo "<br>";
			echo "<br>";
			$fecha1 = new DateTime($actual);
			$fecha2 = new DateTime($futura);
			$fecha = $fecha1->diff($fecha2);
			printf('Te quedan  %d años, %d meses, %d días' , $fecha->y, $fecha->m, $fecha->d);
			echo "<br>";
			echo "<br>";


			
			$ano = substr($nacimiento, -10, 4);
			$mes = substr($nacimiento, -5, 2);
			$dia = substr($nacimiento, -2, 2);
		
			$anoo = substr($actual, -10, 4);
			$mess = substr($actual, -5, 2);
			$diaa = substr($actual, -2, 2);

			$anooo = substr($futura, -10, 4);
			$messs = substr($futura, -5, 2);
			$diaaa = substr($futura, -2, 2);
		
$vivido = $anoo- $ano;
$sobrante = $anooo - $anoo;

$datosTabla = array(
        array( "Vivido", $vivido, "#BDDA4C"),
        array( "Restante", $sobrante, "#FF9A68"),
        
);
$maximo = 0;
foreach ( $datosTabla as $ElemArray ) { $maximo =80 ; }
?>
<table width="400" cellspacing="0" cellpadding="2">
<?php foreach( $datosTabla as $ElemArray ) {
$porcentaje = round((( $ElemArray[1] / $maximo ) * 100),2);
?>
<tr>
    <td width="20%"><strong><?php echo( $ElemArray[0] ) ?></strong></td>
    <td width="10%"><?php echo( $porcentaje ) ?>%</td>
    <td>
        <table width="<?php echo($porcentaje) ?>%" bgcolor="<?php echo($ElemArray[2]) ?>">
        <tr><td></td></tr>
    </table>
    </td>
    </tr>
    <?php } ?>
</table>
<?php
		}



		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}
?>