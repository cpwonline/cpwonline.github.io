<?php
	function head($lug){
?>
		<!--Etiquetas META-->
			<meta name="charset" content="utf-8"/>
			<meta name="author" content="CPW Online"/>
			<meta name="copyright" content="CPW Online"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<meta name="description" content=
				"Somos una empresa creadora de sitios web para grandes, medianas, peque&ntilde;as y muy peque&ntilde;as empresas."
			/>
			<meta name="keywords" content="p&aacute;ginas web, servidores, hosting, emprender, website, dominio, empresas"/>
			<!--Color en Chrome, Firefox y Opera-->
				<meta name="theme-color" content="#006699"/>
			<!--Color en Windows Phone-->
				<meta name="msapplication-navbutton-color" content="#006699"/>
			<!--Color en iOS y Safari-->
				<meta name="apple-mobile-web-app-capable" content="yes"/>
				<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<?php
		if($lug == "home"){
?>
			<link rel="shorcut icon" href="images/logo_small.png">
			<!--Links de css-->
				<link rel="stylesheet" href="css/estilo-gen.css">
				<link rel="stylesheet" href="css/efectos.css">
				<link rel="stylesheet" href="css/estilo-mod.css">
				<link rel="stylesheet" href="css/estilo-res.css">
			<!--Links de JavaScript-->
				<script src="js/jquery-3.0.0.min.js"></script>
				<script src="js/func-gen.js"></script>
				<script src="js/func-ordenar.js"></script>
				<script src="js/func-perfil.js"></script>
<?php
		}else{
?>
			<link rel="shorcut icon" href="../images/logo_small.png"/>
			<!--Links de css-->
				<link rel="stylesheet" href="../css/estilo-gen.css"/>
				<link rel="stylesheet" href="../css/efectos.css"/>
				<link rel="stylesheet" href="../css/estilo-mod.css"/>
				<link rel="stylesheet" href="../css/estilo-res.css"/>
			<!--Links de JavaScript-->
				<script src="../js/jquery-3.0.0.min.js"></script>
				<script src="../js/func-gen.js"></script>
				<script src="../js/func-ordenar.js"></script>
				<script src="../js/func-perfil.js"></script>
<?php
		}
?>
	<div class="espera"></div>
<?php
	}
?>