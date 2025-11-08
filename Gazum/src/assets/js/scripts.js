document.addEventListener("DOMContentLoaded", function () {
  // -----------------------------------------------------------------
  // A. Fonctionnalité de Recherche en Temps Réel
  // -----------------------------------------------------------------
  const searchInput = document.getElementById("searchInput");
  const userTableBody = document.querySelector("#userTable tbody");

  if (searchInput && userTableBody) {
    searchInput.addEventListener("keyup", function () {
      const searchText = searchInput.value.toLowerCase();
      const rows = userTableBody.querySelectorAll("tr");

      rows.forEach((row) => {
        const cells = row.querySelectorAll("td, th");
        let match = false;

        // Recherche dans le texte de toutes les cellules de la ligne
        cells.forEach((cell) => {
          if (cell.textContent.toLowerCase().includes(searchText)) {
            match = true;
          }
        });

        // Afficher ou masquer la ligne
        row.style.display = match ? "" : "none";
      });
    });
  }

  // -----------------------------------------------------------------
  // B. Gestion du Formulaire d'Ajout (Simulation)
  // -----------------------------------------------------------------
  const addUserForm = document.getElementById("addUserForm");

  if (addUserForm) {
    addUserForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const fullName = document.getElementById("fullName").value;
      const email = document.getElementById("email").value;
      const role = document.getElementById("role").value;

      // Simulation d'une alerte de succès
      alert(`Utilisateur ajouté avec succès !
Nom: ${fullName}
Email: ${email}
Rôle: ${role}`);

      // Fermer le modal
      const modalElement = document.getElementById("addUserModal");
      const modal = bootstrap.Modal.getInstance(modalElement);
      if (modal) {
        modal.hide();
      }

      // Réinitialiser le formulaire
      addUserForm.reset();

      // NOTE: En production, vous enverriez ces données à un serveur (PHP/NodeJS/etc.) ici.
    });
  }
});
