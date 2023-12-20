<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Checkout - Aladdin</title>

</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <h1>Aladdin</h1>
        </div>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Nouveautés</a></li>
            <li><a href="#"><span class="fa-solid fa-user"></span> Mon compte</a></li>
            <li><a class="cart-container active" href="#"><span class="fas fa-shopping-cart"></span> Panier</a></li>
            <li>
                <form action="../controleur/login.php">
                    <input type="submit" name="disconnect" value=" " class="fa-solid fa-user-slash" style="margin-left: 10px;cursor: pointer;" />
                </form>
            </li>
        </ul>
    </nav>

    <section class="checkout-section">
        <h2>Récapitulatif du Panier</h2>
        <div class="cart-summary">
            <?= $cartList ?>
        </div>

        <h3>Adresse de Livraison</h3>
        <form id="address-form">
            <label for="fullName">Nom Complet:</label>
            <input type="text" id="fullName" name="fullName" placeholder="Nom Complet" required>

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" placeholder="Adresse" required>

            <label for="city">Ville:</label>
            <input type="text" id="city" name="city" placeholder="Ville" required>

            <label for="zipCode">Code Postal:</label>
            <input type="text" id="zipCode" name="zipCode" placeholder="Code Postal" required>

            <h3>Mode de Paiement</h3>
            <label for="paymentMethod">Sélectionnez le Mode de Paiement:</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="paypal">PayPal</option>
                <option value="paypal">Stripe</option>

            </select>

            <button type="submit">Confirmer la Commande</button>
        </form>
    </section>

    <footer>
        <p>Copyrights <a href="#">Alladin</a></p>
    </footer>



</body>

</html>