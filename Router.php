<?php
    require_once 'ControllerProduct.php';

    class Router{
        private $controller;

        public function __construct(){
            $this->controller = new ControllerProduct();;
        }

        public function handleRequest($url,$method){
            $route = explode("/",trim($url,"/"));

            if($route[0] == 'api'){
                array_shift($route);
            }

            switch ($route[0]){
                case 'produto':
                    if($method === 'GET'){
                        if(isset($route[1])){
                            if(is_numeric($route[1])){
                                return $this->controller->getForId($route[1]);
                            }
                            return $this->controller->search($route[1]);
                        }else{
                            return $this->controller->getAll();
                        }
                    }else if($method === 'POST'){
                        return $this->controller->create($_POST['nome'],$_POST['descricao'], $_POST['valor'], $_POST['quantidade'], $_FILES['imagem']);
                    }else if($method === 'DELETE'){
                        if(isset($route[1])){
                            return $this->controller->delete($route[1]);
                        }else{
                            return [
                                'status' => 'error',
                                'data' => 'Nenhum id especificado'
                            ];
                        }
                    }else{
                        return [
                            'status' => 'error',
                            'data' => 'nenhum método válido'
                        ];
                    }

                    break;
                case 'produto-update':
                    if($method === 'POST'){
                        return $this->controller->update($_POST['nome'],$_POST['descricao'],$_POST['valor'],$_POST['quantidade'],$_FILES['imagem'],$_POST['id']);
                    }

                    break;
                default:
                    return [
                        'status' => 'error',
                         'data' => 'nenhuma rota encontrada'
                        ];

                    break;
            }
        }
    }