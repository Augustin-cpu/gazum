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
        /* ========================================================== */
        /* 1. STYLES GÉNÉRAUX et STICKY NAVBAR */
        /* ========================================================== */
        body {
            /* Pour prendre en compte la hauteur de la navbar dans le contenu */
            padding-top: 56px; 
            background-color: #f8f9fa; /* bg-light de Bootstrap */
        }
        
        /* Rend la barre de navigation fixe en haut */
        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030; /* Assure que la navbar est au-dessus du reste */
        }

        /* Active Flexbox pour la mise en page (Sidebar à droite) */
        #wrapper {
            display: flex; 
            /* Inverse l'ordre : le contenu (page-content-wrapper) sera à gauche */
            flex-direction: row-reverse; 
        }

        /* ========================================================== */
        /* 2. SIDEBAR À DROITE */
        /* ========================================================== */
        #sidebar-wrapper {
            width: 250px; 
            /* Utiliser min-height pour s'assurer que la sidebar descend au moins jusqu'au bas de l'écran */
            min-height: calc(100vh - 56px); /* 100vh moins la hauteur de la navbar (env. 56px) */
            padding-top: 15px;
            color: white;
            flex-shrink: 0; /* Empêche le shrinking */
            border-left: 1px solid rgba(255, 255, 255, 0.2) !important; /* Bordure pour séparer du contenu */
        }

        /* ========================================================== */
        /* 3. COULEURS ET HARMONIE (Thème Vert/Succès) */
        /* ========================================================== */

        /* Titre de la Sidebar */
        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #c3e6cb; /* Vert clair harmonisé */
            border-bottom-color: rgba(255, 255, 255, 0.2) !important;
        }

        /* Liens de la Sidebar (Neutres par défaut) */
        .list-group-item-action {
            color: #d4edda; /* Texte clair mais lisible */
            background-color: transparent;
            border: none;
            padding: 12px 1.5rem; /* Augmente la hauteur des liens */
            font-weight: 500;
        }

        /* Survol et Actif */
        .list-group-item-action:hover, 
        .list-group-item-action.active {
            color: #fff;
            background-color: #1e7e34; /* Vert plus foncé */
            /* Pour rendre le lien actif plus visible */
            border-right: 4px solid white; 
        }

        /* Contenu principal: prend tout l'espace restant */
        #page-content-wrapper {
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-lg border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-graduation-cap me-2"></i> Administration
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link disabled text-white-50"><i class="fas fa-user-circle me-1"></i> Utilisateur: Admin</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm ms-2" href="?url=disconnect">
                            <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="wrapper">
        
        <div id="page-content-wrapper">
            <main class="container-fluid">
                <h1 class="mt-4 mb-4">Aperçu du Tableau de Bord</h1>
                
                <?= $contentpage ?> 
            </main>
        </div>

        <div id="sidebar-wrapper" class="bg-success shadow-lg">
            <div class="sidebar-heading border-bottom">MENU</div>
            <div class="list-group list-group-flush">
                
                <a href="?url=dashboard" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt fa-fw me-2"></i> Tableau de Bord
                </a>
                <a href="?url=enseignants/liste" class="list-group-item list-group-item-action">
                    <i class="fas fa-users fa-fw me-2"></i> Gestion des Enseignants
                </a>
                <a href="?url=classes" class="list-group-item list-group-item-action">
                    <i class="fas fa-school fa-fw me-2"></i> Gestion des Classes
                </a>
                <a href="?url=salaires" class="list-group-item list-group-item-action">
                    <i class="fas fa-money-check-alt fa-fw me-2"></i> Gestion des Salaires
                </a>
                <a href="?url=rapports" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-bar fa-fw me-2"></i> Statistiques & Rapports
                </a>
                <a href="?url=parametres" class="list-group-item list-group-item-action">
                    <i class="fas fa-cog fa-fw me-2"></i> Paramètres
                </a>
                
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=JS_PATH?>js/scripts.js"></script>
    </body>
</html>