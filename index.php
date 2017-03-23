<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Descubra quanto tempo você esta namorando.</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>

	<div class="modal">
			
		<div class="modalHeader">
			Qual sua data de namoro/casamento?
		</div>

		<input type="text" id="dateLove" value="<?php echo (isset($_GET['dateLove'])) ? $_GET['dateLove'] : ""; ?>">

		<button type="button" id="buttonCalculate">
			Calcular
		</button>

		<div class="result">
			<?php

				if(isset($_GET['dateLove'])){
					date_default_timezone_set("America/Sao_paulo");

					$dateLove = $_GET['dateLove'];
					$dateLove = str_replace('/', '-', $dateLove);
					$dateLove = date('Y-m-d', strtotime($dateLove));

					if(strlen($dateLove) < 10 || $dateLove == '1969-12-31'){
						echo "<span>Isto não é possível :D</span>";
					}
					else if($dateLove > date('Y-m-d')){
						echo "<span>Isto não é possível :D</span>";
					}
					else{
						$data1 = new DateTime($dateLove);
						$data2 = new DateTime();

						$intervalo = $data1->diff($data2);

						if($intervalo->y == 1){
							$txtAno = 'ano';
						}
						else{
							$txtAno = 'anos';
						}

						if($intervalo->m == 1){
							$txtMes = 'mês';
						}
						else{
							$txtMes = 'meses';
						}

						if($intervalo->d == 1){
							$txtDia = 'dia';
						}
						else{
							$txtDia = 'dias';
						}

						if($intervalo->y == 0 && $intervalo->m > 0){
							echo "Você namora há: <span>{$intervalo->m} {$txtMes} e {$intervalo->d} {$txtDia}.</span>"; 
						}
						else if($intervalo->y > 0 && $intervalo->m == 0){
							echo "Você namora há: <span>{$intervalo->y} {$txtAno} e {$intervalo->d} {$txtDia}.</span>"; 
						}
						else if($intervalo->y == 0 && $intervalo->m == 0){
							echo "Você namora há: <span>{$intervalo->d} {$txtDia}.</span>";
						}
						else{
							echo "Você namora/casado/undefined: <span>{$intervalo->y} {$txtAno}, {$intervalo->m} {$txtMes} e {$intervalo->d} {$txtDia}.</span>"; 
						}
					}
				}
			?>
		</div>

	</div>
	
</body>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/main.js"></script>

</html>