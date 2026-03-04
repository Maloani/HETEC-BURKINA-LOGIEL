// ===============================
// Contrôleur SPA – Navigation sans rechargement
// ===============================
document.addEventListener("DOMContentLoaded", () => {
  const app = document.getElementById("app");

  // ===============================
  // Fonction pour charger une vue HTML
  // ===============================
  async function loadView(viewName) {
    try {
      const response = await fetch(`views/${viewName}.html`);
      if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);
      const html = await response.text();
      app.innerHTML = html;
      window.scrollTo(0, 0);
      initPageScripts(viewName);
    } catch (err) {
      app.innerHTML = `<p style="color:red;">Erreur : impossible de charger <strong>${viewName}</strong></p>`;
      console.error(err);
    }
  }

  // ===============================
  // Routage simple via hash (#/connexion)
  // ===============================
  function handleRoute() {
    const route = location.hash.replace("#/", "") || "home";
    loadView(route);
  }

  document.querySelectorAll("a[data-route]").forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      const target = link.getAttribute("data-route");
      location.hash = `#/${target}`;
    });
  });

  window.addEventListener("hashchange", handleRoute);
  handleRoute();

  // ===============================
  // Initialisation des scripts spécifiques par vue
  // ===============================
  function initPageScripts(viewName) {
    // ===============================
    // PAGE DE CONNEXION
    // ===============================
    if (viewName === "connexion") {
      const togglePassword = document.getElementById("togglePassword");
      const passwordInput = document.getElementById("password");
      const loginForm = document.getElementById("loginForm");
      const messageEl = document.getElementById("loginMessage");

      // 👁️ Afficher / masquer le mot de passe
      if (togglePassword && passwordInput) {
        togglePassword.addEventListener("click", () => {
          const isVisible = passwordInput.type === "text";
          passwordInput.type = isVisible ? "password" : "text";
          togglePassword.classList.toggle("fa-eye");
          togglePassword.classList.toggle("fa-eye-slash");
        });
      }

      // ✅ URL dynamique (fonctionne sur serveur local et en ligne)
      const baseURL = window.location.origin + "/hetec_administration/";

      // 🚀 Soumission du formulaire de connexion
      if (loginForm) {
        loginForm.addEventListener("submit", async (e) => {
          e.preventDefault();

          const telephone = document.getElementById("telephone").value.trim();
          const mot_de_passe = document.getElementById("password").value.trim();

          messageEl.textContent = "⏳ Connexion en cours...";
          messageEl.style.color = "#0b3b6a";

          const formData = new FormData();
          formData.append("telephone", telephone);
          formData.append("mot_de_passe", mot_de_passe);

          try {
            // ✅ Appel du vrai endpoint
            const response = await fetch(baseURL + "controllers/login.php", {
              method: "POST",
              body: formData,
            });

            const text = await response.text();
            console.log("Réponse brute :", text);

            let result;
            try {
              result = JSON.parse(text);
            } catch (err) {
              messageEl.textContent = "⚠️ Réponse invalide du serveur.";
              messageEl.style.color = "red";
              console.error("Erreur JSON :", err);
              return;
            }

            // ✅ Vérification du résultat
            if (result.status === "success") {
              messageEl.textContent = "✅ Connexion réussie ! Redirection...";
              messageEl.style.color = "green";

              setTimeout(() => {
                const destination =
                  result.role === "admin"
                    ? baseURL + "views/admin_dashboard.html"
                    : baseURL + "views/enseignant_dashboard.html";
                window.location.href = destination;
              }, 1000);
            } else {
              messageEl.textContent =
                result.message || "❌ Numéro ou mot de passe incorrect.";
              messageEl.style.color = "red";
            }
          } catch (error) {
            console.error("Erreur réseau :", error);
            messageEl.textContent = "⚠️ Erreur de connexion au serveur.";
            messageEl.style.color = "red";
          }
        });
      }
    }

    // 👉 Tu peux ajouter ici d'autres scripts pour d'autres vues (portail, etc.)
  }
});
