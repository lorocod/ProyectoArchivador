<?php

$comando = "";
if (isset($_GET['comando']))$comando = $_GET['comando'];

$dirSistema = "..";


switch($comando){
	case "limpiar-cache-prod":
		$ejecutar = "php ". $dirSistema . "/app/console cache:clear --env=prod --no-debug --no-warmup";
	break;
	case "limpiar-cache-dev":
		$ejecutar = "php ". $dirSistema . "/app/console cache:clear";
	break;
	case "ls-dirsistema": // para saber donde estoy parado.
		$ejecutar = "ls ". $dirSistema; 
	break;
	case "dump-sql":
		$ejecutar = "php ". $dirSistema . "/app/console doctrine:schema:update --dump-sql";
	break;
	case "dump-route":
		$ejecutar = "php ". $dirSistema . "/app/console router:debug";
	break;
     
}

?>

<div style="display: block">
<a href="script.php?comando=ls-dirsistema" style="display: block">ls-dirsistema</a>
<a href="script.php?comando=limpiar-cache-prod" style="display: block">limpiar cache Produccion</a>
<a href="script.php?comando=limpiar-cache-dev" style="display: block">limpiar cache Desarrollo</a>
<a href="script.php?comando=dump-sql" style="display: block">Dump Sql</a>
<a href="script.php?comando=dump-route" style="display: block">Rutas</a>
</div>

<br /><br /><br /><br />

<span style="background-color: #000; color: #fff; width: auto; display: block;padding: 3px">Salida</span>
<div style="display: block;border: 1px solid #ccc; height: 70%;overflow-y: auto;overflow-x: auto">

<div style="margin: 5px">
    <pre><?php if(isset($ejecutar))echo passthru($ejecutar); ?>
    </pre>
</div>    
</div>