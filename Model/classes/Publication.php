<?php
    namespace Model\Classes;

    use App\Entity;

    final class Publication extends Entity{

        private $id;
        private $imagePublication;
        private $dateCreation;
        private $contenu;
        private $titre;
        private $user;
        private $categorie;

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
        public function getImagePublication()
        {
                return $this->imagePublication;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setImagePublication($imagePublication)
        {
                $this->imagePublication= $imagePublication;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getDateCreation()
        {
                return $this->dateCreation;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setDateCreation($dateCreation)
        {
                $this->dateCreation = $dateCreation;

                return $this;
        }
        public function getContenu()
        {
                return $this->contenu;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setContenu($contenu)
        {
                $this->contenu= $contenu;

                return $this;
        }
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre= $titre;

                return $this;
        }
        public function getuser()
        {
                return $this->user;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }
        
        public function __toString()
        {
            
                return $this->getId().'  '.$this->getDateCreation().' '.$this->getContenu().' '.$this->getTitre().' '.$this->getUser().' '.$this->getCategorie(); 
                
        }

    }