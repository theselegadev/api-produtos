<?php
    require_once "ConnectDB.php";

    class ProductDao{
        // Inserir dados
        public function Create($name, $desc, $value, $amount, $image){
            $sql = "INSERT INTO PRODUTO (NOME, DESCRICAO, VALOR, QUANTIDADE, IMAGEM) VALUES (?,?,?,?,?)";

            if(!getimagesize($image['tmp_name'])){
                return [
                    'status'=>'error',
                    'data'=>'O arquivo enviado não é uma imagem!'
                ];
            }

            $fileName = uniqid() . '-' . basename($image['name']);
            $filePath = "uploads/" . $fileName;

            if(move_uploaded_file($image['tmp_name'],$filePath)){
                $res = ConnectDB::getConnect()->prepare($sql);

                $res->bindValue(1,$name);
                $res->bindValue(2,$desc);
                $res->bindValue(3,$value);
                $res->bindValue(4,$amount);
                $res->bindValue(5,$filePath);

                $res->execute();

                return ['status' => 'success', 'data' => 'Produto cadastrado com sucesso!'];
            }else{
                return ['status' => 'error', 'data' => 'Falha no upload da imagem'];
            }
            
        }

        // Pegar dados
        public function GetAll(){
            $sql = "SELECT * FROM PRODUTO";

            $res = ConnectDB::getConnect()->query($sql);

            $products = $res->rowCount()>0 ? [
                'status' => 'success',
                 'data' => $res->fetchAll(\PDO::FETCH_ASSOC)
                 ]
                  : [
                    'status' => 'error',
                     'data' => 'Nenhum produto cadastrado!'
                    ];
            
            return $products;
        }

        // Pesquisar dados
        public function Search($string){
            $sql = "SELECT * FROM PRODUTO WHERE NOME LIKE ?";
            
            $string = "%".$string."%";

            $res = ConnectDB::getConnect()->prepare($sql);

            $res->bindValue(1,$string);

            $res->execute();

            $products = $res->rowCount()>0 ? [
                'status' => 'success',
                 'data' => $res->fetchAll(\PDO::FETCH_ASSOC)
                 ]
                  : [
                    'status' => 'error',
                     'data' => 'Nenhum produto encontrado!'
                    ];
            
            return $products;
        }

        // Deletar dado
        public function Delete($id){
            $sql = "DELETE FROM PRODUTO WHERE ID = $id";
       
            if($res = ConnectDB::getConnect()->query($sql)){
                return [
                    'status' => 'success',
                    'data' => 'Produto deletado com sucesso'
                ];
            }else{
                return [
                    'status' => 'error',
                    'data' => 'Erro ao deletar produto'
                ];
            }    
        }

        // Atualizar dados
        public function Update($name, $desc, $value, $amount, $image,$id){
            $sql = "UPDATE PRODUTO SET NOME = ?, DESCRICAO = ?, VALOR = ?, QUANTIDADE = ?, IMAGEM = ? WHERE ID = ?";

            if(!getimagesize($image['tmp_name'])){
                return [
                    'status' => 'error',
                    'data' => 'O arquivo utilizado não é uma imagem'
                ];
            }

            $fileName = uniqid() . "-" . basename($image['name']);
            $filePath = "uploads/" . $fileName;

            if(move_uploaded_file($image['tmp_name'],$filePath)){

                $res = ConnectDB::getConnect()->prepare($sql);
    
                $res->bindValue(1,$name);
                $res->bindValue(2,$desc);
                $res->bindValue(3,$value);
                $res->bindValue(4,$amount);
                $res->bindValue(5,$filePath);
                $res->bindValue(6,$id);
    
                $res->execute();
    
                return [
                    'status' => 'success',
                    'data' => 'Produto atualizado com sucesso!'
                ];
            }else{
                return [
                    'status' => 'error',
                    'data' => 'Falha em fazer o upload no arquivo!'
                ];
            }

        }
    }