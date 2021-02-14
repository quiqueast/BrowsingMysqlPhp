<?php

function mes($fecha){
	
	$mes = explode("-", $fecha);

	switch ($mes[1]) {
		case '01':
			$mes = 'Jan '.$mes[2];
			break;
		case '02':
			$mes = 'Feb '.$mes[2];
			break;
		case '03':
			$mes = 'Mar '.$mes[2];
			break;
		case '04':
			$mes = 'Apr '.$mes[2];
			break;
		case '05':
			$mes = 'May '.$mes[2];
			break;
		case '06':
			$mes = 'Jun '.$mes[2];
			break;
		case '07':
			$mes = 'Jul '.$mes[2];
			break;
		case '08':
			$mes = 'Aug '.$mes[2];
			break;
		case '09':
			$mes = 'Sep '.$mes[2];
			break;
		case '10':
			$mes = 'Oct '.$mes[2];
			break;
		case '11':
			$mes = 'Nov '.$mes[2];
			break;
		case '12':
			$mes = 'Dec '.$mes[2];
			break;
		
		default:
			# code...
			break;
	}
	return $mes;
};

?>