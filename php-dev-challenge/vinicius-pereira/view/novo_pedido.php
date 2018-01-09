<?php
if (!defined("DS")) {
  define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("BASE_DIR")) {
  define('BASE_DIR', dirname(dirname(__FILE__)) . DS);
}
require_once BASE_DIR . "model" . DS . "Produto.php";
session_start();
if(isset($_SESSION["produtos"]))
  $produtos = $_SESSION["produtos"];
else
  header("location: ../controller/ControlPedido.php?action=carregaNovo");
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
  <script src="assets/js/valida_pedido.js"></script>
  <link rel="stylesheet" href="assets/css/padrao.css">
</head>
<body>
  <?php include "menu.php"; ?>
  <form action="../controller/ControlPedido.php?action=inserir" method="POST">
    <div class="col-md-10 col-md-offset-1">
      <h1 class="title">Novo Pedido</h1>
      <div class="col-md-12">
        <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
        <h4 class="title">Dados</h4>
        <div class="form-group col-md-3">
          <label for="data">Data:</label>
          <input id="data" type="date" name="dataPedido" class="form-control"/>
        </div>
        <div class="form-group col-md-3 col-md-offset-3">
          <label for="total">Total:</label>
          <input id="total" type="text" name="total" class="form-control" disabled="true" />
        </div>
        <div class="form-group col-md-3 gasparzinho">
          <label for="oi">OI:</label>
          <input id="oi" type="date" name="data" class="form-control"/>
        </div>
        <h4 class="title">Produtos</h4>
        <div class="form-group col-md-12">
          <label for="produtos">Selecione os produtos (Segure CTRL para selecionar mais de um!):</label>
          <select multiple class="form-control" id="produtos" name="produtos[]">
            <?php foreach ($produtos as $p) {?>
            <option value="<?php echo $p->getId(); ?>" preco="<?php echo $p->getPreco(); ?>"><?php echo $p->getNome(); ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div id="cadastrar" class="col-md-12">
      <button type="submit" class="btn btn-default col-md-offset-5 col-md-2">Cadastrar</button>
    </div>
  </form>
</body>
</html>