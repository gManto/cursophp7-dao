<?php

Class Usuario{

  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;


  public function getIdusuario(){
    return $this->idusuario;
  }

  public function getDesenha(){
    return $this->dessenha;
  }

  public function getDtcadastro(){
    return $this->dtcadastro;
  }

  public function getDeslogin(){
    return $this->deslogin;
  }

  public function setIdusuario($value){
    $this->idusuario = $value;
  }

  public function setDeslogin($value){
    $this->deslogin = $value;
  }

  public function setDesenha($value){
    $this->dessenha = $value;
  }

  public function setDtcadastro($value){
    $this->dtcadastro = $value;
  }


  public function __toString(){

    return json_encode(array(
        "idusuario"=>$this->getIdusuario(),
        "deslogin"=>$this->getDeslogin(),
        "dessenha"=>$this->getDesenha()
      //  "dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
    ));
  }


/**
*
*
*/
  public function loadById($id){

    $sql = new Sql();
    $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ", array(
       ":ID"=>$id
    ));

    if(count($results) > 0){
       $row = $results[0];
       $this->setIdusuario($row['idusuario']);
       $this->setDeslogin($row['deslogin']);
       $this->setDesenha($row['dessenha']);
       $this->setDtcadastro(new DateTime($row['dtcadastro']));
    }
  }

  public static function getList(){

      $sql = new Sql();
      $results =   $sql->SELECT("select * from tb_usuarios order by deslogin;");
      return $results;
  }

  public static function search($login){

      $sql = new Sql();
      $results =   $sql->SELECT("select * from tb_usuarios where deslogin like :SEARCH order by deslogin;", array(
        ':SEARCH'=>"%$login%"
      ));

      return $results;
  }


  public function login($login, $senha){

      $sql = new Sql();
      $sql = new Sql();
      $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASSWORD ", array(
         ":LOGIN"=>$login,
         ":PASSWORD"=>$senha
      ));

      if(count($results) > 0){
         $row = $results[0];
         $this->setIdusuario($row['idusuario']);
         $this->setDeslogin($row['deslogin']);
         $this->setDesenha($row['dessenha']);
         $this->setDtcadastro(new DateTime($row['dtcadastro']));
      }else{
          throw new Exception("Login e/ou senha inválidos",1);

      }

  }

}

 ?>
