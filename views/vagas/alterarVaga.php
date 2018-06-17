<h5 class="card-title">Atualizar vaga</h5>
<form action="/vagas/editarVagas.php" method="post">
    <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
    </div>

    <div>
        <label for="area">Área</label>
        <input type="text" name="area" id="area">
    </div>

    <div>
        <label for="remuneracao">Remuneração</label>
        <input type="value" name="remuneracao" id="remuneracao">
    </div>
    
    <div>
        <label for="prazo_inscricoes">Prazo inscricoes (formato data)</label>
        <input type="text" name="prazo_inscricoes" id="prazo_inscricoes">
    </div>

    <div>
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao">
    </div>

    <div>
        <label for="carga_horaria">Carga horária</label>
        <input type="value" name="carga_horaria" id="carga_horaria">
    </div>

    <div>
        <label for="meses_duracao">Meses duracao</label>
        <input type="value" name="meses_duracao" id="meses_duracao">
    </div>
    
    <input type="hidden" name="idvaga" value="<?php echo $_GET['idvaga']; ?>">
    <input type="submit" value="Update">
</form>