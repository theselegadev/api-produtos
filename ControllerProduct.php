<?php
    require_once("ProductDao.php");

    class ControllerProduct{
        private $productDao;

        public function __construct(){
            $this->productDao = new ProductDao();
        }

        public function getAll(){
            return $this->productDao->GetAll();
        }

        public function create($name, $desc, $value, $amount, $image){
            return $this->productDao->create($name, $desc, $value, $amount, $image);
        }

        public function search($string){
            return $this->productDao->Search($string);
        }

        public function update($name, $desc, $value, $amount, $image,$id){
            return $this->productDao->Update($name,$desc,$value,$amount,$image,$id);
        }

        public function delete($id){
           return $this->productDao->delete($id);
        }
    }