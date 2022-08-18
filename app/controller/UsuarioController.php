<?php
include_once "../conexao/Conexao.php";
include_once "../model/Usuario.php";
include_once "../dao/UsuarioDAO.php";


$usuario = new Usuario();
$usuariodao = new UsuarioDAO();



$d = filter_input_array(INPUT_POST);


if(isset($_POST['cadastrar'])){

    $usuario->setNome($d['nome']);
    $usuario->setCep($d['cep']);
    $usuario->setEndereco($d['rua']);
    $usuario->setBairro($d['bairro']);
    $usuario->setCidade($d['cidade']);
    $usuario->setEstado($d['uf']);


    $usuariodao->create($usuario);

    header("Location: ../../");
} 
