<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* Style pour centrer la carte au milieu de la page */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa; /* Couleur de fond légère */
        }
        /* Style pour la carte de connexion */
        .login-card {
            width: 100%;
            max-width: 400px; /* Limiter la largeur du formulaire */
            padding: 20px;
        }
        /* Style pour centrer la carte au milieu de la page */
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa; /* Couleur de fond légère */
        }
        /* Style pour la carte */
        .register-card {
            width: 100%;
            max-width: 500px; /* Une carte légèrement plus large que la connexion */
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <?= $contentpage ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>