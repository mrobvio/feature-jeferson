<?php

class UsuarioDAO{
    
    public function create(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuarios (                   
                  nome,cep,endereco,bairro,cidade,estado)
                  VALUES (
                  :nome,:cep,:endereco,:bairro,:cidade,:estado)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":cep", $usuario->getCep());
            $p_sql->bindValue(":endereco", $usuario->getEndereco());
            $p_sql->bindValue(":bairro", $usuario->getBairro());
            $p_sql->bindValue(":cidade", $usuario->getCidade());
            $p_sql->bindValue(":estado", $usuario->getEstado());
           
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM usuarios order by id asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Não foi possivel buscar os registros" . $e;
        }
    }
     



    

    private function listaUsuarios($row) {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setCep($row['cep']);
        $usuario->setEndereco($row['endereco']);
        $usuario->setBairro($row['bairro']);
        $usuario->setCidade($row['cidade']);
        $usuario->setEstado($row['estado']);
     

        return $usuario;
    }
 }

 ?>
