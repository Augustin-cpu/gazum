<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <link rel="stylesheet" href="<?=CSS_PATH?>css/style.css">
    
    <style>
        /* Styles personnalisés */
        #wrapper {
            display: flex; /* Active Flexbox pour la mise en page à deux colonnes */
        }
        
        /* Sidebar: couleur de fond verte */
        #sidebar-wrapper {
            width: 250px; /* Largeur fixe de la sidebar */
            min-height: 100vh; /* S'étend sur toute la hauteur de la fenêtre */
            padding-top: 15px;
            color: white;
            transition: margin .25s ease-out; /* Pour une future animation (cacher/montrer) */
            /* Assure que la sidebar ne prend pas de place dans le flux du contenu */
            flex-shrink: 0; 
        }

        /* Liens de la Sidebar */
        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            text-transform: uppercase;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.7);
        }

        .list-group-item-action {
            color: rgba(255, 255, 255, 0.8);
            background-color: transparent;
            border: none;
            padding: 10px 1.5rem;
        }

        .list-group-item-action:hover, .list-group-item-action.active {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.1); /* Légèrement plus foncé au survol/actif */
        }

        /* Contenu principal: prend tout l'espace restant */
        #page-content-wrapper {
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm border-bottom border-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-tools me-2"></i>Administration</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#"><i class="fas fa-user-circle"></i> Utilisateur: Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?url=disconnect"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="wrapper">

        <div id="sidebar-wrapper" class="bg-success border-end border-light">
            <div class="sidebar-heading border-bottom border-light">Tableau de Bord</div>
            <div class="list-group list-group-flush">
                
                <a href="#" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt me-2"></i> Aperçu
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-users me-2"></i> Gestion des Utilisateurs
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-box me-2"></i> Gestion des Salaires
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-line me-2"></i> Rapports
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-cog me-2"></i> Paramètres
                </a>
                
            </div>
        </div>
        <div id="page-content-wrapper">
            <main class="container-fluid">
                <h1 class="mt-4 mb-4">Aperçu du Tableau de Bord</h1>
                
                <?= $contentpage ?> 
            </main>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=JS_PATH?>js/scripts.js"></script>
    </body>
</html>