<h5 class="card-title">Atualizar vaga</h5>
<form action="/vagas/editarVagas.php" method="post">

     <div class="form-group">
        <label for="titulo">Título</label>
        <input required class="form-control" type="text" name="titulo" id="titulo" 
        placeholder="Qual título da vaga ?">
    </div>

    <div class="form-group">
        <label for="area">Área</label>
        <input required class="form-control" type="text" name="area" id="area" 
        placeholder="A qual área se refere a vaga ?">
    </div>

    <div class="form-group">
        <label for="remuneracao">Remuneração</label>
        <input required class="form-control" type="text" name="remuneracao" id="remuneracao" 
        placeholder="Valor da remuneração ?">
    </div>

    <div class="form-group">
        <label for="prazo_inscricoes">Prazo inscricoes(formato de data)</label>
        <input required class="form-control" type="text" name="prazo_inscricoes" id="prazo_inscricoes" 
        placeholder="Dia/Mês/Ano">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input required class="form-control" type="text" name="descricao" id="descricao" 
        placeholder="Qual descrição da vaga ?">
    </div>

    <div class="form-group">
        <label for="carga_horaria">Carga horária</label>
        <input required class="form-control" type="text" name="carga_horaria" id="carga_horaria" 
        placeholder="Qual carga horária semana em horas ?">
    </div>

   <div class="form-group">
        <label for="meses_duracao">Meses duração</label>
        <input required class="form-control" type="text" name="meses_duracao" id="meses_duracao" 
        placeholder="Quantos meses de duração ?">
    </div>
    
    <input type="hidden" name="idvaga" value="<?php echo $_GET['idvaga']; ?>">
    <input class="btn btn-primary" type="submit" value="Atualizar">
</form>