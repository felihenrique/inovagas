<h5 class="card-title">Cadastro de alunos</h5>
<form action="criaraluno.php" method="post">
    <?php require_once('views/usuario/criarusuario.php'); ?>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input required class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome completo">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="curso">Curso</label>
            <input required type="text" class="form-control" name="curso" id="curso" placeholder="Digite o curso">
        </div>
        <div class="form-group col-md-2">
            <label for="num_matricula">Nº matrícula</label>
            <input type="text" class="form-control" name="num_matricula" id="num_matricula"
            placeholder="Digite o n° de matrícula no curso">
        </div>
        <div class="form-group col-md-2">
            <label for="semestre_inicio">Ano início</label>
            <input required type="text" class="form-control" name="ano_inicio" id="ano_inicio">
        </div>
        <div class="form-group col-md-2">
            <label for="semestre_inicio">Semestre início</label>
            <input required type="text" class="form-control" name="semestre_inicio" id="semestre_inicio">
        </div>
    </div>

    <div class="form-group">
        <label for="rua">Data nascimento</label>
        <input type="text" name="data_nascimento" class="form-control" id="data_nascimento"
        placeholder="DD/MM/YYY">
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>
        <input required type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu cpf">
    </div>

    <input type="submit" class="btn btn-primary" value="Submeter">
</form>