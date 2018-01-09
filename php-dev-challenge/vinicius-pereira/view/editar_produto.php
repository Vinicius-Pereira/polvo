<?php
require_once "../model/Produto.php";
session_start();
$produto = $_SESSION["produto"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>VP - CRUD</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/monetario.js"></script>
  <script src="assets/js/tratamento.js"></script>
  <script src="assets/js/valida_produto.js"></script>
  <link rel="stylesheet" href="assets/css/padrao.css">
</head>
<body>
  <?php include "menu.php"; ?>
  <form action="../controller/ControlProduto.php?action=editar" method="POST">
    <div class="col-md-10 col-md-offset-1">
      <h1 class="title">Editar Produto</h1>
      <div class="col-md-12">
        <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
        <h4 class="title">Dados</h4>
        <input id="" type="text" name="id" class="avoid" value="<?php echo $produto->getId();?>"/>
        <div class="form-group col-md-12">
          <label for="cep">Nome:</label>
          <input id="nome" type="text" name="nome" class="form-control" placeholder="Refrigerante Cini Framboesa" value="<?php echo $produto->getNome();?>"/>
        </div>
        <div class="form-group col-md-4">
          <label for="cnpj">SKU:</label>
          <input id="sku" type="text" name="sku" class="form-control" placeholder="BRC-1942" maxlength="10" value="<?php echo $produto->getSKU();?>"/>
        </div>
        <div class="form-group col-md-4">
          <label for="cnpj">Preço:</label>
          <input id="preco" type="text" name="preco" class="form-control" placeholder="R$ 5,00" value="<?php echo "R$" . number_format($produto->getPreco(), 2); ?>"/>
        </div>

        <div class="form-group col-md-12">
          <label for="cnpj">Descrição:</label>
          <textarea id="descricao" name="descricao" class="form-control" rows="5" ><?php echo $produto->getDescricao();?></textarea> 
        </div>
      </div>
    </div>
    <div id="cadastrar" class="col-md-12">
      <button type="submit" class="btn btn-default col-md-offset-5 col-md-2">Salvar</button>
    </div>
  </form>
</body>
</html>