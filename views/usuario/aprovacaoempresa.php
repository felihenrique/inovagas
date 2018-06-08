<?php

$empresas = [
	[ 'nome' => 'empresa 1', 'email' => 'a@a.com' ],
	[ 'nome' => 'empresa 2', 'email' => 'a@a.com' ]
];
?>
<table>
<tr>
	<th>Nome</th>
	<th>Email</th>
</tr>
<?php foreach ($empresas as $empresa) { ?>
	<tr>
		<td><?php echo $empresa['nome'] ?></td>
		<td><?php echo $empresa['email'] ?></td>
	</tr>
<?php } ?>
</table>