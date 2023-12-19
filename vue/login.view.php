<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aladdin - Connexion</title>
</head>
<body>

    <nav class="navbar">
        <div class="logo"><h1>Aladdin</h1></div>
        <ul class="menu">
            <li><a href="index.html" class="active">Connexion</a></li>
            <!-- <li><a href="#">Nouveautés</a></li> -->
            <!-- <li><a href="#"><span class="fa-solid fa-user"></span>  Mon compte</a></li> -->
            <!-- <li><a href="#"class="fas fa-shopping-cart">Panier</a></li> -->
        </ul>
    </nav>

    <section class="login-section">
        <h2>Connexion</h2>
        <form action="../controleur/login.php" method="post">
            <label for="username">Nom:</label>
            <input type="text" name="name">

            <label for="pwd">Mot de passe:</label>
            <input type="password" id="pwd" name="pwd">

            <p style="color:red; font-style:italic;"><?=$message?></p>

            <button type="submit" name="signing-in">Se connecter</button>
            <!-- Amélioration possible : Utiliser JS. Nous ne le ferons pas pour rester sur du php intégralement. -->
            <br/>
            <button type="submit" name="signing-up">S'inscrire</button>
        </form>
    </section>

    <footer>
        <p>Copyrights<a href="index.html">Alladin</a></p>
    </footer>

</body>
</html>
