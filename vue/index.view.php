<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/assets/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aladdin</title>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <h1><a href="index.php">Aladdin</a></h1>
        </div>
        <ul class="menu">
            <li><a href="index.php" class="active">Accueil</a></li>
            <li><a href="#">Nouveautés</a></li>
            <li><a href="settings.php"><span class="fa-solid fa-user"></span> Mon compte</a></li>
            <li style="position: relative;">
                <a class="cart-container" href="./checkout.php"><span class="fas fa-shopping-cart"></span> Panier</a>
                <div class="cart-view">
                    <?=$cartList?>
                </div>
            </li>
            <?= $panel ?>
            <li>
                <form action="../controleur/login.php">
                    <input type="submit" name="disconnect" value=" " class="fa-solid fa-user-slash" style="margin-left: 10px;cursor: pointer;" />
                </form>
            </li>
        </ul>
    </nav>

    <section class="section_produits">
        <h1 class="produits_txt">Catalogue :</h1>
        <h2>Tendance :</h2>

        <?= $dynamicHTML ?>
    </section>
    <footer>
        <p>Copyrights <a href="#">Alladin</a></p>
    </footer>

</body>

</html>