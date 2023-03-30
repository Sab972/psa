<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\PublicationManager;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {
    }

    public function registerForm()
    {

        return [
            "view" => VIEW_DIR . "register.php",
            "data" => null,
        ];
    }
    
//Creation d'un user(s'enregistrer)
    public function register()
    {

        if (!empty($_POST)) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST, "motDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmMotDePasse = filter_input(INPUT_POST, "confirmMotDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           

            if ($pseudo && $motDePasse && $email) {

                if (($motDePasse == $confirmMotDePasse) and strlen($motDePasse) >= 8) {
                 //strlen : calcul la taille dune chaine    

//Ici on vérifie si le nom d'utilisateur existe deja ou pas
                    $manager = new UserManager();
                    $user = $manager->findOneByPseudo($pseudo);

                    if (!$user) {
//Hashage du mot de passe 
//PASSWORD_DEFAULT :utilisation de l'algorythme bcrypt
// password_hash :crée un nouveau hachage en utilisant un algorithme de hachage fort et irréversible.
                        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

                        // algo fort : algo recommandé par Owasp et la CNIL, qui nous permet d'avoir une empreinte numérique

                        // empreinte numérique :Séquence de caractères alphanumériques de longueur fixe, 
                        //qui représente le contenu d'un message, sans le révéler, dont la valeur unique est produite par un algorithme de hachage,
                        // et qu'on utilise pour créer une signature numérique.

                        // salt :c'est une petite donnée additionnelle qui renforce significativement la puissance du hachage
                        // pour le rendre beaucoup plus difficile à cracker. 

                        // $role = ["ROLE_ USER"];
                        if ($manager->add([

                            "pseudo" => $pseudo,
                            "email" => $email,
                            "motDePasse" => $hash,
                            "role" => json_encode(['ROLE_USER']),

                        ])) {


                            return  [
//On redirige vers la page home
                                "view" => VIEW_DIR . "home.php",
                            ];
                        }
                    }
                }
            }
        }
//Puis vers la page security/register
        return  [
            "view" => VIEW_DIR . "register.php",
          
        ];
    }

    public function loginForm()
    {
        return [
            "view" => VIEW_DIR . "login.php",
            "data" => null,
        ];
    }


//Fonction Connexion

    public function login()
    {// SI LA SUPERGLOBALE "$_POST" CONTIENT DES INFORMATIONS ALORS ON LES FILTRE
    
        if (!empty($_POST)) {
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST, "motDePasse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($pseudo && $motDePasse  ) {

//Ici on fait le lien entre le pseudo et motDePasse

                $manager = new UserManager();
                $user = $manager->findOneByPseudo($pseudo);

                if ($user) {

                    

                //Verification du motDePasse grace a password_verify: Vérifie qu'un mot de passe correspond à un hachage
                    if (password_verify($motDePasse, $user->getMotDePasse())) {

                        
                        Session::setUser($user);//Connexion user
                       
                        Session::addFlash("success", "Bienvenue $pseudo");
                        header('Location:index.php');
                        exit();
                    }
                //     else{
                //         Session::addFlash('error', 'Le mot de passe doit comporter 8 caractères minimum');
                       
                //     //message flash d'erreur si le mot de passe ne comporte pas 8 caracteres minimum
                  
                // }
           // }
           // else {
               // Session::addFlash("error","pseudo déja utilisé"); 
               // header('Location:index.php');
                       // exit();
            }
            //else{
                //Session::addFlash("error","email déja enregistrer");
                
            
        }              
        
            
        

        
        return  [

                "view" => VIEW_DIR . "login.php",
            ];


        }
    }


    //Fonction deconnexion

    public function logout()

    {


//Fonction setUser dans Session (met un user dans la session pour le maintenir connecté, si null deconexion)
        Session::setUser(null);
        Session::addFlash("success","Déconnexion avec succès a bientôt =) ");
        header('Location: index.php');
//Alors redirection sur la page index
    }



            // public function modifyPassword(){


            // }
            public function viewProfile(){

                $publicationManager = new PublicationManager();

                

                $user = Session::getUser();
                return [
    
                    "view" => VIEW_DIR . "profil.php",
        
                    "data" => [
                        "publications" => $publicationManager->findPublicationsByUser($user)
                    ]
        
                ];
            }
            
        }
    

