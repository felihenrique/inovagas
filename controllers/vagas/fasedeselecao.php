<?php
require_once("VagaRepository.php");
$vagaRepo = new VagaRepository();
if (isset($_GET['idvaga']))
{
    $vagaRepo->avancarFaseDeSelecao($_GET['idvaga']);
    header('Location:/vagas/listarVagasEmSelecao.php');
} else{
    ?>       
    <script>
    alert('Não foi possivel deletar!');
    history.go(-1);
    </script>
    <?php
}
