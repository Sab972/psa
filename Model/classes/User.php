<?php
    namespace Model\Classes;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $email;
        private $pseudo;
        private $motDePasse;
        private $role;
        private $pays;

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
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        public function getMotDePasse()
        {
                return $this->motDePasse;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setMotDePasse($motDePasse)
        {
                $this->motDePasse= $motDePasse;

                return $this;
        }

        public function getRole()
        {
                return $this->role;
        }
      
        public function afficherRole(){
          if(in_array("ROLE_ADMIN",$this->getRole())){
                return "admin";
          }else{
            return "user";
          }
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        //public function setRole($role)
        //{
                //$this->role= $role;

              //  return $this;
      //  }

        public function setRole($r)
        {
            // on indique ici que l'on va récuperer du Json que nous allons récuperer
            $this->role = json_decode($r);
            // si il n'y a pas de role attitré
            if(empty($this->$r)){
                // on attribut automaitquement le role User 
                $this->role[]= "ROLE_USER";
            }
            return $this;
        }

        public function hasRole($role){
                // on retourne donc si dans le tableau Json on trouve un role qui correspond au role envoyer en paramêtre alors on return true ;
                  return in_array($role,$this->getRole());
                }
        
        public function getPays()
        {
                return $this->pays;
        }
        
        public function setPays($pays)
        {
                $this->pays= $pays;

                return $this;
        }

        public function __toString()
        {
            
                return $this->getId().' '.$this->getEmail().' '.$this->getPseudo().' '.$this->getMotDePasse().' '.$this->getPays(); 
                
        }
    }