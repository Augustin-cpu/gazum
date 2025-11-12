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
        /* 1. STYLES GÉNÉRAUX et NAVBAR FIXE */
        /* ========================================================== */
        :root {
            --navbar-height: 56px;
            --sidebar-width: 250px;
        }

        body {
            /* Marge pour la navbar */
            padding-top: var(--navbar-height); 
            background-color: #f8f9fa; 
        }
        
        /* Rend la barre de navigation fixe en haut */
        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030; 
        }

        /* Active Flexbox pour la mise en page (Sidebar à gauche) */
        #wrapper {
            display: flex; 
            /* Rétablit l'ordre standard : Sidebar (Gauche) | Contenu (Droite) */
            flex-direction: row; /* Changement ici : de row-reverse à row */
        }

        /* ========================================================== */
        /* 2. SIDEBAR FIXE À GAUCHE (MODIFICATIONS CLÉS) */
        /* ========================================================== */
        #sidebar-wrapper {
            width: var(--sidebar-width); 
            
            /* Rendre la sidebar FIXE pour qu'elle ne bouge pas au scroll */
            position: fixed;
            top: var(--navbar-height); /* Commence sous la navbar fixe */
            left: 0; /* Changement ici : coller à GAUCHE */
            
            /* S'étend sur le reste de la hauteur de la fenêtre */
            height: calc(100vh - var(--navbar-height)); 
            padding-top: 15px;
            color: white;
            z-index: 1020; /* Sous la navbar */
            /* Bordure à droite pour séparer du contenu */
            border-right: 1px solid rgba(255, 255, 255, 0.2) !important; 
            border-left: none !important; /* Retirer la bordure gauche inutile */
        }

        /* ========================================================== */
        /* 3. AJUSTEMENT DU CONTENU PRINCIPAL */
        /* ========================================================== */
        #page-content-wrapper {
            /* Le contenu doit laisser de la place à la sidebar fixe */
            margin-left: var(--sidebar-width); /* Changement ici : de margin-right à margin-left */
            width: 100%; /* Prend le reste de l'espace */
            padding: 20px;
        }

        /* 4. COULEURS ET HARMONIE (Styles inchangés) */
        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #c3e6cb; 
            border-bottom-color: rgba(255, 255, 255, 0.2) !important;
        }

        .list-group-item-action {
            color: #d4edda; 
            background-color: transparent;
            border: none;
            padding: 12px 1.5rem; 
            font-weight: 500;
        }

        .list-group-item-action:hover, 
        .list-group-item-action.active {
            color: #fff;
            background-color: #1e7e34; 
            /* Bordure active à gauche */
            border-left: 4px solid white; 
            border-right: none; 
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
        
        <div id="page-content-wrapper">
            <main class="container-fluid">
                <h1 class="mt-4 mb-4">Aperçu du Tableau de Bord (Gazum)</h1>
                
                <?= $contentpage ?> 
            </main>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=JS_PATH?>js/scripts.js"></script>
    </body>
</html>