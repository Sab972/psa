<?php
    namespace Model\Classes;

    use App\Entity;

    final class Categorie extends Entity{

        private $id;
        private $imageCategorie;
        private $nom;
       

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of text
         */ 
        public function getImageCategorie()
        {
                return $this->imageCategorie;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setImageCategorie($imageCategorie)
        {
                $this->imageCategorie = $imageCategorie;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }
        
        public function __toString()
        {
            
                return $this->getId().' '.$this->getImageCategorie().' '.$this->getNom(); 
                
        }
    }