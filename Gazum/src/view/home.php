<main class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="h3 text-primary"><i class="fas fa-list-ul me-2"></i>Liste des Utilisateurs</h1>
        </div>
        <div class="col-md-6 text-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus me-1"></i> Ajouter un Utilisateur
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <div class="p-3 border-bottom bg-white">
                <input type="text" class="form-control" id="searchInput" placeholder="Rechercher par Nom, Email ou Rôle...">
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0" id="userTable">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach($users as $user):?>
                        <tr>

                            <th scope="row"><?= $user['users_id']?></th>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['prenom'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><a href="?url=home/nom=<?= $user['nom_fonction'] ?>"><span class="badge bg-danger"><?= $user['nom_fonction'] ?></span></a></td>
                            <td><span class="badge bg-success">Actif</span></td>
                            <td>
                                <button class="btn btn-sm btn-info text-white me-1" title="Modifier"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-warning me-1" title="Bloquer"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                            <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-user-plus me-2"></i>Ajouter un nouvel utilisateur</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  method="post">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="fullName" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Fonction</label>
                        <select class="form-select" name="fonction_id" id="role" required>
                            <option value="Choisissez">Attribue une fonction</option>
                       <?php foreach($fonction as $fonc):?>
                            <option value="<?=$fonc['fonction_id']?>"><?= $fonc['nom_fonction']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>