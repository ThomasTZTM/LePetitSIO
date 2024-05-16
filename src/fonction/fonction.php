 <?php

 function convertirDuree($duree) {
     $heures = floor($duree / 60);
     $minutes = $duree % 60;
     return sprintf("%02dh%02d", $heures, $minutes);
 }



function ValDeMdp($erreurs, $mdp, $email){
    require_once '../base.php';
    // Connexion à la base de données
    require_once BASE_PROJET .
        '/src/database/pdo-function.php';

    $logins = pdologin();

    if (empty($mdp)) {
        $erreurs['mdp'] = "Le mot de passe est obligatoire";
    }
    if (empty($email)) {
        $erreurs['email'] = "L'email est obligatoire";
    } elseif (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'email n'est pas une email";
    }
    $test = 0;
    $id = 0;
    foreach ($logins as $login){
        if ($login["email_utilisateur"]==$email){
            $id_bdd = $login["id_utilisateur"];
            $mdp_bdd = $login["mdp_utilisateur"];
            $test++;
        }
    }
    if ($test == 0){
        $erreurs['login'] = "L'email ou le mot de passe est incorrect";
        $erreurlog=$erreurs['login'];
    }
    if (!empty($mdp_bdd)){
        if (password_verify($mdp, $mdp_bdd)){
            //echo "MDP OK";
        }else{
            $erreurs['login'] = "L'email ou le mot de passe est incorrect";
            $erreurlog=$erreurs['login'];
        }
    }

    return $erreurs;
}




 function ValDeMdp2($erreurs, $mdp, $email){
     $erreurlog ="";
     require_once '../base.php';
     // Connexion à la base de données
     require_once BASE_PROJET .
         '/src/database/pdo-function.php';

     $logins = pdologin();

     if (empty($mdp)) {
         $erreurs['mdp'] = "Le mot de passe est obligatoire";
     }
     if (empty($email)) {
         $erreurs['email'] = "L'email est obligatoire";
     } elseif (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
         $erreurs['email'] = "L'email n'est pas une email";
     }
     $test = 0;
     $id = 0;
     foreach ($logins as $login){
         if ($login["email_utilisateur"]==$email){
             $id_bdd = $login["id_utilisateur"];
             $mdp_bdd = $login["mdp_utilisateur"];
             $test++;
         }
     }
     if ($test == 0){
         $erreurs['login'] = "L'email ou le mot de passe est incorrect";
         $erreurlog=$erreurs['login'];
     }
     if (!empty($mdp_bdd)){
         if (password_verify($mdp, $mdp_bdd)){
             //echo "MDP OK";
         }else{
             $erreurs['login'] = "L'email ou le mot de passe est incorrect";
             $erreurlog=$erreurs['login'];
         }
     }

     return $erreurlog;
 }



 function ValDeMdp3($erreurs, $mdp, $email){
     $pseudo_bdd ="";
     require_once '../base.php';
     // Connexion à la base de données
     require_once BASE_PROJET .
         '/src/database/pdo-function.php';

     $logins = pdologin();

     if (empty($mdp)) {
         $erreurs['mdp'] = "Le mot de passe est obligatoire";
     }
     if (empty($email)) {
         $erreurs['email'] = "L'email est obligatoire";
     } elseif (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
         $erreurs['email'] = "L'email n'est pas une email";
     }
     $test = 0;
     $id = 0;
     foreach ($logins as $login){
         if ($login["email_utilisateur"]==$email){
             $id_bdd = $login["id_utilisateur"];
             $pseudo_bdd = $login["pseudo_utilisateur"];
             $mdp_bdd = $login["mdp_utilisateur"];
             $test++;
         }
     }
     if ($test == 0){
         $erreurs['login'] = "L'email ou le mot de passe est incorrect";
         $erreurlog=$erreurs['login'];
     }
     if (!empty($mdp_bdd)){
         if (password_verify($mdp, $mdp_bdd)){
             //echo "MDP OK";
         }else{
             $erreurs['login'] = "L'email ou le mot de passe est incorrect";
             $erreurlog=$erreurs['login'];
         }
     }

     return $pseudo_bdd;
 }

 function ValDeMdp4($erreurs, $mdp, $email){
     $pseudo_bdd ="";
     require_once '../base.php';
     // Connexion à la base de données
     require_once BASE_PROJET .
         '/src/database/pdo-function.php';

     $logins = pdologin();

     if (empty($mdp)) {
         $erreurs['mdp'] = "Le mot de passe est obligatoire";
     }
     if (empty($email)) {
         $erreurs['email'] = "L'email est obligatoire";
     } elseif (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
         $erreurs['email'] = "L'email n'est pas une email";
     }
     $test = 0;
     $id = 0;
     foreach ($logins as $login){
         if ($login["email_utilisateur"]==$email){
             $id_bdd = $login["id_utilisateur"];
             $pseudo_bdd = $login["pseudo_utilisateur"];
             $mdp_bdd = $login["mdp_utilisateur"];
             $test++;
         }
     }
     if ($test == 0){
         $erreurs['login'] = "L'email ou le mot de passe est incorrect";
         $erreurlog=$erreurs['login'];
     }
     if (!empty($mdp_bdd)){
         if (password_verify($mdp, $mdp_bdd)){
             //echo "MDP OK";
         }else{
             $erreurs['login'] = "L'email ou le mot de passe est incorrect";
             $erreurlog=$erreurs['login'];
         }
     }

     return $id_bdd;
 }

?>
