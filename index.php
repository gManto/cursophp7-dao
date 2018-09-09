?<?php

require_once("config.php");


//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

// carrega Usuario
/*
$root = new Usuario();
$root->loadById(4);
echo $root;
*/
// carrega lista
//$lista = Usuario::getList();
 //echo json_encode($lista);


// CARREGA USUARIO PELO LOGIN
//$lista = Usuario::search("jo");

// login
$usuario = new Usuario();
$usuario->login('Jose','123456789');
echo $usuario;



 ?>
