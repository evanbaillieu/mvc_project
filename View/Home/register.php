<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Manager Entité</title>
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Glegoo" rel="stylesheet">
</head>

<style>
    /* Minimal properties */
    .bold {
        font-weight: bold;
    }

    /*General*/
    body {
        background-color: #f1f1f1;
        min-height: 100%;
        margin: 0;
        font-family: 'Source Sans Pro', sans-serif;
        color: #000;
        text-align: center;
    }

    hr {
        border: none;
        border-top: 1px solid rgba(0, 0, 0, 0.3);
        width: 80%;
        margin: 20px 10%;
    }

    /* Title */
    h1 {
        font-family: 'Glegoo', serif;
        font-size: 2em;
    }

    /* Form */
    form {
        width: 70%;
        margin: 0 15%;
        text-align: center;
    }
</style>

<body>
    <header>
        <h1>Création/Modification d'un User</h1>
    </header>
    <hr />
    <section id="main-section">
        <form action="register.php" method="POST">
            <label>Mail :</label><br />
            <input type="email" name="email" placeholder="Mail.." /><br>
            <label>Mot de passe :</label><br />
            <input type="password" name="password" placeholder="Mot de passe.." /><br>
            <label>Nom :</label><br />
            <input type="text" name="lastName" placeholder="Nom.." /><br>
            <label>Prénom :</label><br />
            <input type="text" name="firstName" placeholder="Prénom.." /><br>
            <label>Adresse :</label><br />
            <input type="text" name="address" placeholder="Adresse.." /><br>
            <label>Code Postal :</label><br />
            <input type="text" name="postalCode" placeholder="Code Postal.." /><br>
            <label>Ville :</label><br />
            <input type="text" name="city" placeholder="Ville.." /><br>
            <p>
                <input type="submit" class="submit-btn" name="submit-create-user" value="Créer/Valider">
            </p>
        </form>
    </section>
</body>

</html>