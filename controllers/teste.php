<?php

$empresas = [
	[ 'nome' => 'empresa 1', 'email' => 'a@a.com' ],
	[ 'nome' => 'empresa 2', 'email' => 'a@a.com' ]
];
?>
<table>
<?php foreach ($empresas as $empresa) { ?>
	Nome empresa: <?php echo $empresa['nome'] ?> , Email empresa: <?php echo $empresa['email'] ?><br>
<?php } ?>
</table>