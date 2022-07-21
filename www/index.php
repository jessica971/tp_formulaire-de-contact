<?php 
define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" ? true : false);

$firstname = $lastname = $subject = $email = $message = ""; //initialise la variable a 0

//Les variables PHP $_GET et $_POST sont utilisées pour collectées les données postées par les formulaires. $_GET et $_POST sont des tableaux associatifs contenant des paires clé/valeur où les clés sont les noms des contrôles de formulaires (name="...") et les valeurs sont les données d'entrée de l'utilisateur.

if ($_SERVER["REQUEST_METHOD"] == "POST") { //$_SERVER : ce sont des valeurs utiles que nous donne le serveur. Pour les afficher, il faut indiquer ce qu'on demande entre crochets puisque que c'est un array.
    if(IS_DEBUG){
        echo "POST";
    }
    $firstname = isset($_POST["firstname"]) ? checkInput($_POST["firstname"]) : "";
    $lastname = isset($_POST["lastname"]) ? checkInput($_POST["lastname"]) : "";
    $subject = isset($_POST["subject"]) ? checkInput($_POST["subject"]) : "";
    $email = isset($_POST["email"]) ? checkInput($_POST["email"]) : "";
    $message = isset($_POST["message"]) ? checkInput($_POST["message"]) : "";
} else {
    if (IS_DEBUG) {
        echo "Pas de POST";
    }
}

function checkInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>TP Discord</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css" media="all and (max-width: 768px)">
</head>

<body>
    <div id="formulaire">
        <form method="post" action="<?php echo htmlspecialchars() $_SERVER["PHP_SELF"]?>">
            <input type="text" placeholder="Prenom" name="firstname" value="<?php echo $firstname ?>" required>
            <!-- les variable sont appeler par l'attribut name -->
            <!-- //value permet de afficher ce que l'utilisateur a tapez -->
            <input type="text" placeholder="Nom" name="lastname" value="<?php echo $lastname ?>" required>
            <input type="text" placeholder="Sujet" name="subject" value="<?php echo $subject ?>" required>
            <input type="text" placeholder="exemple@gmail.com" name="email" value="<?php echo $email ?>" required>
            <textarea name="message" placeholder="Tapez votre meessage" cols="30" rows="10" require>
            <?php echo $message ?> </textarea>
            <!-- <div id="select"> 
            <select name="date">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <select name="month">
                <option>Janviers</option>
                <option>Février</option>
                <option>Mars</option>
                <option>Avril</option>
                <option>Mai</option>
            </select>
            <select>
                <option>2021</option>
                <option> 2022</option>
                <option> 2023</option>
                <option> 2024</option>
                <option> 2025</option>
            </select>
            </div> -->
            <input type="submit" value="ENVOYER">
        </form>
    </div>
</body>

</html>