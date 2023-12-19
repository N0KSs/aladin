<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Aladdin</title>
</head>
<body>

    <nav class="navbar">
        <div class="logo"><h1><a  href="index.php">Aladdin</a></h1></div>
        <ul class="menu">
            <li><a href="index.php" class="active">Accueil</a></li>
            <li><a href="#">Nouveautés</a></li>
            <li><a href="#"><span class="fa-solid fa-user"></span>Mon compte</a></li>
            <li><a href="#"><span class="fas fa-shopping-car"></span>Panier</a></li>
            <li>
                <form action="../controleur/login.php">
                    <input type="submit" name="disconnect" value="" class="fa-solid fa-user-slash"/>
                </form>
            </li>
        </ul>
    </nav>
    <section class="content">
        <h1>Nouveautés</h1>
        <p>Notre catalogue avec les technologies les plus avancées : </p>
        <button>DECOUVRIR</button>
    </section>

    <h1 class="produits_txt">Nos meilleur ventes</h1>
    <section class="section_produits">
        <div class="produits">
            <div class="carte">
                <div class="img"><img src="Site E-com Info/2.jpg"></div>
                <div class="desc">Rizen 5x</div>
                <div class="titre">PC Gamer</div>
                <div class="box">
                    <div class="prix">659$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div>
            <div class="carte">
                <div class="img"><img src="Site E-com Info/3.jpg"></div>
                <div class="desc">Rizen 5x</div>
                <div class="titre">PC Gamer</div>
                <div class="box">
                    <div class="prix">1209$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/4.jpg"></div>
                <div class="desc">Rizen 5x</div>
                <div class="titre">PC Gamer</div>
                <div class="box">
                    <div class="prix">1659$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/5.jpg"></div>
                <div class="desc">Razor new gen</div>
                <div class="titre">PC Gamer(laptop)</div>
                <div class="box">
                    <div class="prix">782$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/6.jpg"></div>
                <div class="desc">set clavier/souris razor</div>
                <div class="titre">autres</div>
                <div class="box">
                    <div class="prix">420$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/7.jpg"></div>
                <div class="desc"> ecran 144hz msi</div>
                <div class="titre">ecran</div>
                <div class="box">
                    <div class="prix">640$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/8.jpg"></div>
                <div class="desc">Rizen 5x</div>
                <div class="titre">PC Gamer</div>
                <div class="box">
                    <div class="prix">759$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div><div class="carte">
                <div class="img"><img src="Site E-com Info/9.jpg"></div>
                <div class="desc">carte graphique geforce rtx 3060</div>
                <div class="titre">PC Gamer</div>
                <div class="box">
                    <div class="prix">532$</div>
                    <button class="achat">Acheter</button>
                </div>
            </div>
             
        </div>
    </section>
<footer>
    <p>Copyrights <a href="#">Alladin</a></p>
</footer>

</body>
</html>

