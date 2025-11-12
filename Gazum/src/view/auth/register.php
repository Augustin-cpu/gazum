<div class="register-container">
    <div class="card register-card border-0">
        
        <div class="card-header bg-success text-white text-center py-3 rounded-top">
            <i class="fas fa-user-plus fa-2x mb-2"></i>
            <h4 class="mb-0">Créer un Compte Administrateur</h4>
        </div>

        <div class="card-body p-4">
            
            <?php 
            // Exemple de message d'erreur si la validation échoue
            if (isset($error_message)): 
            ?>
            <div class="alert alert-danger text-center small" role="alert">
                <i class="fas fa-exclamation-triangle me-1"></i> <?= $error_message ?>
            </div>
            <?php endif; ?>

            <form method="POST">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label small fw-bold">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prenom" class="form-label small fw-bold">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold">Adresse Email (Login)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-success"></i></span>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               placeholder="admin@domaine.com" 
                               required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="fonction" class="form-label small fw-bold">Fonction / Rôle</label>
                    <select class="form-select" id="fonction" name="fonction_id" required>
                       <?php foreach($fonction as $func): ?>
                          <?php if(isset($func['nom_fonction']) && ($func['nom_fonction'] === 'Administrateur' || $func['nom_fonction'] === 'Manager')): ?>
                             <option value="<?= htmlspecialchars($func['fonction_id']) ?>">
                                <?= htmlspecialchars($func['nom_fonction']) ?>
                             </option>
                          <?php endif; ?>
                       <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-bold">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-success"></i></span>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password_confirm" class="form-label small fw-bold">Confirmer le Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-success"></i></span>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirm" 
                               name="password_confirm" 
                               required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-user-check me-2"></i> Inscription
                    </button>
                </div>
            </form>
        </div>
        
        <div class="card-footer text-center small text-muted">
            <p class="mb-0">Déjà inscrit ? <a href="?url=login" class="text-success text-decoration-none fw-bold">Connectez-vous ici.</a></p>
        </div>
    </div>
</div>