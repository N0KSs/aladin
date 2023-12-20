<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aladdin - Paramètres</title>

</head>
<body>

    <nav class="navbar">
        <div class="logo"><h1>Aladdin</h1></div>
        <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Nouveautés</a></li>
            <li><a href="settings.php" class="active"><span class="fa-solid fa-user"></span> Mon compte</a></li>
            <li><a class="cart-container" href="#"><span class="fas fa-shopping-cart"></span> Panier</a></li>
            <li>
                <form action="../controleur/login.php">
                    <input type="submit" name="disconnect" value=" " class="fa-solid fa-user-slash" style="margin-left: 10px;cursor: pointer;" />
                </form>
            </li>
        </ul>
    </nav>

    <section class="settings-section">
        <h2>Paramètres du Compte</h2>
        <form id="update-form" action="../controleur/settings.php" method="post">
            <label for="firstName">Prénom:</label>
            <input type="text" id="firstName" name="fname" value="<?=$identifiants["fname"]?>" required>

            <label for="lastName">Nom:</label>
            <input type="text" id="lastName" name="lname" value="<?=$identifiants["lname"]?>" required>

            <button type="submit" name="save">Enregistrer les modifications</button>

        </form>

        <form id="delete-form" action="../controleur/login.php" method="post">
            <h3>Supprimer le Compte</h3>
            <p>Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible.</p>
            
            <button type="submit" name="dissolve" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte? Cette action est irréversible.')">Supprimer le Compte</button>
        </form>
    </section>

    <footer>
        <p>Copyrights<a href="index.html">Alladin</a></p>
    </footer>


</body>
</html>
