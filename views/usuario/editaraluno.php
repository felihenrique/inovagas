<h5 class="card-title">Editar perfil</h5>
<form action="editaraluno.php" method="post">
    <?php require_once('views/usuario/editarusuario.php'); ?>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input required class="form-control" type="text" name="nome" id="nome" 
        placeholder="Digite o nome completo" value="<?php echo $dados['nome'] ?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="curso">Curso</label>
            <input required type="text" class="form-control" name="curso" id="curso" 
            placeholder="Digite o curso" value="<?php echo $dados['curso'] ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="num_matricula">Nº matrícula</label>
            <input type="text" class="form-control" name="num_matricula" id="num_matricula"
            placeholder="Digite o n° de matrícula no curso" value="<?php echo $dados['num_matricula'] ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="semestre_inicio">Ano início</label>
            <input required type="text" class="form-control" name="ano_inicio" 
            id="ano_inicio" value="<?php echo $dados['ano_inicio'] ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="semestre_inicio">Semestre início</label>
            <input required type="text" class="form-control" name="semestre_inicio" 
            id="semestre_inicio" value="<?php echo $dados['semestre_inicio'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="rua">Data nascimento</label>
        <input type="text" name="data_nascimento" class="form-control" id="data_nascimento"
        placeholder="DD/MM/YYY" value="<?php echo $dados['data_nascimento'] ?>">
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>
        <input required type="text" class="form-control" name="cpf" id="cpf" 
        placeholder="Digite seu cpf" value="<?php echo $dados['cpf'] ?>">
    </div>

    <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $dados['idusuario'] ?>">
    <input class="btn btn-primary" type="submit" value="Submeter">
</form>