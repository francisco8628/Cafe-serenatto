<?php

require 'src/conexao-bd.php';
require 'src/Model/Produto.php';
require 'src/Repository/ProdutoRepository.php';

$prodotoRepository = new ProdutoRepository($pdo);
$prodotoRepository->deleteProduto($_POST['id']);
header('Location: admin.php');
