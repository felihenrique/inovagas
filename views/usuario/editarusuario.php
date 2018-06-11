<div class="form-row">
    <div class="form-group col-md-6"> 
        <label for="senha">Senha</label>
        <input required class="form-control" type="password" name="senha" id="senha" 
        placeholder="Digite a senha que será usada para autenticação">
    </div>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input required type="text" class="form-control" name="email" id="email" placeholder="Digite seu email"
    value="<?php echo $dados['email'] ?>">
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="rua">Rua</label>
        <input required type="text" class="form-control" name="rua" id="rua" placeholder="Digite o nome completo da rua"
        value="<?php echo $dados['rua'] ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="bairro">Bairro</label>
        <input required type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro"
        value="<?php echo $dados['bairro'] ?>">
    </div>

    <div class="form-group col-md-4">
        <label for="rua">Cidade</label>
        <input required type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade"
        value="<?php echo $dados['cidade'] ?>">
    </div>

    <div class="form-group col-md-1">
        <label for="rua">Estado</label>
        <input required type="text" class="form-control" name="estado" id="estado"
        value="<?php echo $dados['estado'] ?>">
    </div>
</div>

