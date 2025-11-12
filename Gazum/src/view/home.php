<!-- <main class="container-lg my-5">
    <div class="row mb-4 align-items-center">
        
        <div class="col-md-6">
            <h1 class="h3 text-primary">
                <i class="fas fa-list-ul me-2"></i> Liste des Utilisateurs
                <span class="badge bg-primary-subtle text-primary ms-2"><?= count($users) ?? 0 ?> Total</span>
            </h1>
        </div>
        
        <div class="col-md-6 text-md-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus me-1"></i> Ajouter un Utilisateur
            </button>
        </div>
    </div>

    <div class="card border-0">
        <div class="card-body p-0">

            <div class="border-bottom bg-light">
                <input type="text" class="form-control" id="searchInput" placeholder="Rechercher par Nom, Email ou Rôle...">
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0" id="userTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <?php $is_active = (int)($user['statut'] ?? 1) === 1; ?>
                            
                            <tr>
                                <th scope="row"><?= $user['users_id'] ?></th>
                                <td><?= $user['nom'] ?></td>
                                <td><?= $user['prenom'] ?></td>
                                <td><?= $user['email'] ?></td>
                                
                                <td>
                                    <a href="?url=home/nom=<?= $user['nom_fonction'] ?>" class="text-decoration-none">
                                        <span class="badge bg-info text-dark"><?= $user['nom_fonction'] ?></span>
                                    </a>
                                </td>
                                
                                <td>
                                    <?php if ($is_active): ?>
                                        <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Actif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i> Bloqué</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Modifier" data-bs-toggle="modal" data-bs-target="#editUserModal-<?= $user['users_id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <?php if ($is_active): ?>
                                        <button class="btn btn-sm btn-outline-warning me-1" title="Bloquer">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-outline-success me-1" title="Activer">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    <?php endif; ?>
                                    
                                    <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Aucun utilisateur trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <nav class="mt-4 d-flex justify-content-center" aria-label="Pagination des utilisateurs">
        </nav>
</main>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-user-plus me-2"></i> Ajouter un nouvel utilisateur</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Fonction</label>
                        <select class="form-select" name="fonction_id" id="role" required>
                            <option value="" selected disabled>Attribuez une fonction</option>
                       <?php foreach($fonction as $fonc):?>
                            <option value="<?=$fonc['fonction_id']?>"><?= $fonc['nom_fonction']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmer le Mot de passe</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    </div>
                    
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer l'utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<?php
// --- DONNÉES SIMULÉES (À REMPLACER PAR VOTRE LOGIQUE PHP/BDD) ---
// Ces variables doivent être chargées depuis votre base de données via votre contrôleur.
$total_enseignants = 145;
$enseignants_actifs = 138;
$enseignants_nouvelles_recrues = 5;
$fonctions_principales = [
    ['nom' => 'Professeurs Titulaires', 'count' => 85, 'icon' => 'user-tie', 'color' => 'primary'],
    ['nom' => 'Assistants', 'count' => 40, 'icon' => 'chalkboard-teacher', 'color' => 'info'],
    ['nom' => 'Vacataires', 'count' => 20, 'icon' => 'user-clock', 'color' => 'warning'],
];
$alertes_recentes = [
    ['type' => 'Avis', 'message' => 'Rapport annuel des présences dû le 30/11.', 'date' => 'Hier', 'class' => 'warning'],
    ['type' => 'Nouveau', 'message' => 'Nouvelle recrue : Dr. M. Kamba ajouté.', 'date' => 'Aujourd\'hui', 'class' => 'success'],
    ['type' => 'Urgent', 'message' => 'Mise à jour requise du profil pour 3 enseignants.', 'date' => '2 heures', 'class' => 'danger'],
];
// -----------------------------------------------------------------
?>

<div class="container-fluid py-4">
    
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-6 text-success fw-bold">
                <i class="fas fa-home me-2"></i> Tableau de Bord Principal
            </h1>
            <p class="text-muted">Vue d'ensemble et accès rapide aux fonctionnalités de gestion des enseignants.</p>
        </div>
    </div>
    
    <div class="row">
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow-lg border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="h5 mb-0 fw-bold"><?= $total_enseignants ?></div>
                            <div class="text-white-50 small">Total des Enseignants</div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="fas fa-users fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow-lg border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="h5 mb-0 fw-bold"><?= $enseignants_actifs ?></div>
                            <div class="text-white-50 small">Enseignants Actifs</div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="fas fa-check-circle fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-dark shadow-lg border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="h5 mb-0 fw-bold">+<?= $enseignants_nouvelles_recrues ?></div>
                            <div class="text-black-50 small">Nouvelles Recrues (30 jours)</div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="fas fa-user-plus fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info text-white shadow-lg border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="h5 mb-0 fw-bold">12</div>
                            <div class="text-white-50 small">Évaluations à Venir</div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="fas fa-calendar-alt fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-light fw-bold text-primary">
                    <i class="fas fa-sitemap me-2"></i> Répartition par Fonction
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($fonctions_principales as $fonction): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-<?= $fonction['icon'] ?> text-<?= $fonction['color'] ?> me-2"></i> 
                                <?= $fonction['nom'] ?>
                            </div>
                            <span class="badge bg-<?= $fonction['color'] ?> rounded-pill fs-6"><?= $fonction['count'] ?></span>
                        </li>
                        <?php endforeach; ?>
                        <li class="list-group-item text-center">
                            <a href="?url=enseignants/liste" class="text-success text-decoration-none fw-bold">
                                Voir la liste complète <i class="fas fa-arrow-circle-right ms-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-light fw-bold text-danger">
                    <i class="fas fa-bell me-2"></i> Notifications & Alertes
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($alertes_recentes as $alerte): ?>
                        <li class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <span class="badge bg-<?= $alerte['class'] ?>"><?= $alerte['type'] ?></span>
                                <small class="text-muted"><?= $alerte['date'] ?></small>
                            </div>
                            <p class="mb-1 mt-1 small"><?= $alerte['message'] ?></p>
                        </li>
                        <?php endforeach; ?>
                        <li class="list-group-item text-center">
                            <a href="?url=notifications" class="text-muted small">
                                Toutes les notifications
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="row mt-4">
        <div class="col-12">
            <h5 class="text-muted mb-3"><i class="fas fa-bolt me-2"></i> Actions Rapides</h5>
        </div>
        
        <div class="col-md-3 mb-3">
            <a href="#" class="btn btn-outline-success w-100 p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus fa-2x d-block mb-1"></i>
                Ajouter un Enseignant
            </a>
        </div>
        
        <div class="col-md-3 mb-3">
            <a href="?url=enseignants/recherche" class="btn btn-outline-primary w-100 p-3 shadow-sm">
                <i class="fas fa-search fa-2x d-block mb-1"></i>
                Rechercher un Profil
            </a>
        </div>
        
        <div class="col-md-3 mb-3">
            <a href="?url=rapports" class="btn btn-outline-info w-100 p-3 shadow-sm">
                <i class="fas fa-chart-line fa-2x d-block mb-1"></i>
                Générer un Rapport
            </a>
        </div>
        
        <div class="col-md-3 mb-3">
            <a href="?url=presences" class="btn btn-outline-warning w-100 p-3 shadow-sm">
                <i class="fas fa-clipboard-check fa-2x d-block mb-1"></i>
                Saisir les Présences
            </a>
        </div>
    </div> -->
<div class="row mt-4">
        <div class="col-12">
            <h5 class="text-muted mb-3"><i class="fas fa-bolt me-2"></i> Actions Rapides</h5>
        </div>
        
        <div class="col-md-3 mb-3">
            <button type="button" class="btn btn-outline-success w-100 p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus fa-2x d-block mb-1"></i>
                Ajouter un Enseignant
            </button>
        </div>
        
        <div class="col-md-3 mb-3">
            <button type="button" class="btn btn-outline-primary w-100 p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fas fa-search fa-2x d-block mb-1"></i>
                Rechercher un Profil
            </button>
        </div>
        
        <div class="col-md-3 mb-3">
            <button type="button" class="btn btn-outline-info w-100 p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#reportModal">
                <i class="fas fa-chart-line fa-2x d-block mb-1"></i>
                Générer un Rapport
            </button>
        </div>
        
        <div class="col-md-3 mb-3">
            <button type="button" class="btn btn-outline-warning w-100 p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#presenceModal">
                <i class="fas fa-clipboard-check fa-2x d-block mb-1"></i>
                Saisir les Présences
            </button>
        </div>
    </div>

</div>
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-user-plus me-2"></i> Ajouter un nouvel enseignant</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="?url=enseignants/add">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Fonction</label>
                        <select class="form-select" name="fonction_id" id="role" required>
                            <option value="" selected disabled>Attribuez une fonction</option>
                       <?php // Supposons que $fonction contient les données des fonctions ?>
                       <?php /* foreach($fonction as $fonc):?>
                            <option value="<?=$fonc['fonction_id']?>"><?= $fonc['nom_fonction']?></option>
                        <?php endforeach; */?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmer le Mot de passe</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    </div>
                    
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Enregistrer l'enseignant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="searchModalLabel"><i class="fas fa-search me-2"></i> Rechercher un Profil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?url=enseignants/recherche" method="GET">
                    <div class="mb-3">
                        <label for="search_term" class="form-label">Nom, Prénom ou Matricule de l'enseignant</label>
                        <input type="text" name="q" class="form-control form-control-lg" id="search_term" placeholder="Ex: Jean Dupont ou E-1234" required>
                    </div>
                    <p class="text-muted small">Vous serez redirigé vers la page des résultats de recherche.</p>
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="reportModalLabel"><i class="fas fa-chart-line me-2"></i> Options de Rapport</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?url=rapports/generate" method="POST">
                    <div class="mb-3">
                        <label for="report_type" class="form-label">Type de Rapport</label>
                        <select class="form-select" name="type" id="report_type" required>
                            <option value="" selected disabled>Sélectionnez le type</option>
                            <option value="presences">Rapport de Présences (Annuel)</option>
                            <option value="salaires">Rapport des Salaires (Trimestriel)</option>
                            <option value="evaluation">Rapport d'Évaluation (Par Matière)</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label">Date de Début</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label">Date de Fin</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" required>
                        </div>
                    </div>
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-info text-white">Générer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="presenceModal" tabindex="-1" aria-labelledby="presenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="presenceModalLabel"><i class="fas fa-clipboard-check me-2"></i> Saisir les Présences</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?url=presences/entry" method="POST">
                    <div class="mb-3">
                        <label for="session_date" class="form-label">Date de la Séance</label>
                        <input type="date" name="session_date" class="form-control" id="session_date" value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="session_class" class="form-label">Classe/Groupe</label>
                        <select class="form-select" name="class_id" id="session_class" required>
                            <option value="" selected disabled>Sélectionnez la classe</option>
                            <?php // Intégrer la boucle pour les classes ici ?>
                        </select>
                    </div>
                    <p class="text-muted small">Cliquer sur "Continuer" vous mènera à la grille de saisie des présences pour cette classe.</p>
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning text-dark">Continuer la Saisie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>