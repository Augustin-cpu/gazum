

<div class="login-container">
    <div class="card login-card border-0">
        
        <div class="card-header bg-success text-white text-center py-3 rounded-top">
            <i class="fas fa-lock fa-2x mb-2"></i>
            <h4 class="mb-0">Accès Administration</h4>
        </div>

        <div class="card-body p-4">
            
            <?php 
            // Exemple de message d'erreur si la connexion échoue
            if (isset($error_message)): 
            ?>
            <div class="alert alert-danger text-center small" role="alert">
                <i class="fas fa-exclamation-triangle me-1"></i> <?= $error_message ?>
            </div>
            <?php endif; ?>

            <form method="POST">
                
                <div class="mb-3">
                    <label for="username" class="form-label small fw-bold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-user-shield text-success"></i></span>
                        <input type="email" 
                               class="form-control" 
                               id="username" 
                               name="email" 
                               placeholder="admin@example.com" 
                               required 
                               autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-bold">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-success"></i></span>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="********" 
                               required>
                    </div>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label small" for="rememberMe">Se souvenir de moi</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-sign-in-alt me-2"></i> Se Connecter
                    </button>
                </div>
            </form>
        </div>
        
        <div class="card-footer text-center small text-muted">
            <a href="#" class="text-success text-decoration-none">Mot de passe oublié ?</a> | 
            <a href="?url=register" class="text-secondary text-decoration-none">Creation d'un compte</a>
        </div>
    </div>
</div>

