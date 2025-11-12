<main class="container-lg my-5">
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
</div>