<?php



class Pessoa {

private $nome;
private $idade;
private $sexo;


                  public function getNome(){
                  return $this->nome;
}

         public function setNome($n){
         $this->nome = $n;
}

public function getIdade(){
return $this->idade;
}

        public function setIdade($i){
        $this->idade= $i;
}

                  public function getSexo(){
                  return $this->sexo;
}
                             public function setSexo($s){
                              $this->sexo = $s;
}


public function exibir(){
        $info = array(
         "nome" => $this->getNome(),
         "idade" => $this->getIdade(),
         "sexo" => $this->getSexo()      
          );
    return $info;
}

}

$p1 = new Pessoa();
$p1->setNome("bruno");
$p1->setIdade("12");
$p1->setSexo("masculino");

print_r($p1->exibir());


?>