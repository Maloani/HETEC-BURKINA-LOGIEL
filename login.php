<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion – HETEC Burkina Faso</title>
  <link rel="icon" href="img/hetec.jpg-2.webp" type="image/webp">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <style>
    :root {
      --primary: #0b3b6a;
      --secondary: #c58a00;
      --light: #f5f7fb;
      --dark: #1a1a1a;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, rgba(11,59,106,0.97), rgba(197,138,0,0.85));
      background-size: 200% 200%;
      animation: moveGradient 12s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    @keyframes moveGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-box {
      background: #fff;
      color: var(--dark);
      width: 100%;
      max-width: 420px;
      padding: 2.5rem 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.25);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .login-header {
      text-align: center;
      margin-bottom: 1.8rem;
    }

    .login-logo {
      width: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
      box-shadow: 0 0 10px rgba(11,59,106,0.3);
    }

    .login-header h2 {
      color: var(--primary);
      font-size: 1.5rem;
      margin-bottom: 0.4rem;
      font-weight: 700;
    }

    .login-header p {
      color: #555;
      font-size: 0.95rem;
    }

    .input-group {
      margin-bottom: 1.2rem;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 0.3rem;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    input {
      padding: 0.75rem 0.9rem;
      border-radius: 8px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      transition: 0.3s;
    }

    input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 6px rgba(11,59,106,0.25);
      outline: none;
    }

    .password-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .password-wrapper input {
      width: 100%;
      padding-right: 2.5rem;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      cursor: pointer;
      color: #888;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: var(--primary);
    }

    .btn-login {
      width: 100%;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      padding: 0.85rem;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.25s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 10px rgba(11,59,106,0.3);
    }

    .btn-back {
      width: 100%;
      background: #ddd;
      color: var(--primary);
      border: none;
      padding: 0.8rem;
      border-radius: 8px;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.25s;
    }

    .btn-back:hover {
      background: #ccc;
      transform: translateY(-2px);
    }

    .forgot {
      text-align: center;
      margin-top: 1rem;
    }

    .forgot a {
      color: var(--primary);
      font-weight: 600;
      text-decoration: none;
    }

    .forgot a:hover {
      color: var(--secondary);
      text-decoration: underline;
    }

    .forgot-info {
      display: none;
      text-align: center;
      margin-top: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .login-message {
      text-align: center;
      margin-top: 1rem;
      font-weight: 600;
      font-size: 0.95rem;
    }

    @media (max-width: 480px) {
      .login-box { padding: 1.8rem 1.2rem; }
      .login-header h2 { font-size: 1.25rem; }
    }
  </style>
</head>
<body>
  <section class="login">
    <div class="login-box">
      <div class="login-header">
        <img src="img/hetec.jpg-2.webp" alt="Logo HETEC" class="login-logo" />
        <h2><i class="fa-solid fa-user-shield"></i> Espace Administration</h2>
        <p>Connectez-vous avec vos identifiants.</p>
      </div>

      <form id="loginForm">
        <div class="input-group">
          <label for="telephone"><i class="fa-solid fa-phone"></i> Numéro de téléphone</label>
          <input type="tel" id="telephone" name="telephone" placeholder="Ex : +226 60112233" required />
        </div>

        <div class="input-group">
          <label for="password"><i class="fa-solid fa-lock"></i> Mot de passe</label>
          <div class="password-wrapper">
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="********" required />
            <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
          </div>
        </div>

        <button type="submit" class="btn-login">
          <i class="fa-solid fa-right-to-bracket"></i> Se connecter
        </button>

        <button type="button" class="btn-back" onclick="window.location.href='index.php'">
          <i class="fa-solid fa-arrow-left"></i> Retour à l’accueil
        </button>

        <p class="forgot"><a href="#" onclick="showForgotInfo()">Mot de passe oublié ?</a></p>
      </form>

      <p id="loginMessage" class="login-message"></p>

      <div class="forgot-info" id="forgotInfo">
        <p>Contactez l'administrateur au numéro suivant : <a href="tel:+22654401500">+226 54401500</a></p>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const form = document.getElementById("loginForm");
      const msg = document.getElementById("loginMessage");
      const toggle = document.getElementById("togglePassword");
      const pass = document.getElementById("mot_de_passe");

      // 👁️ Afficher / masquer le mot de passe
      toggle.addEventListener("click", () => {
        const visible = pass.type === "text";
        pass.type = visible ? "password" : "text";
        toggle.classList.toggle("fa-eye");
        toggle.classList.toggle("fa-eye-slash");
      });

      // 🔐 Soumission du formulaire
      form.addEventListener("submit", async (e) => {
        e.preventDefault();
        msg.textContent = "⏳ Connexion en cours...";
        msg.style.color = "#0b3b6a";

        const data = new FormData(form);

        try {
          const response = await fetch("controllers/login.php", { method: "POST", body: data });
          const text = await response.text();
          let result;
          try {
            result = JSON.parse(text);
          } catch {
            msg.textContent = "⚠️ Réponse invalide du serveur.";
            msg.style.color = "red";
            return;
          }

          if (result.status === "success") {
            msg.textContent = "✅ Connexion réussie ! Redirection...";
            msg.style.color = "green";
            setTimeout(() => {
              if (result.role === "admin") window.location.href = "views/admin_dashboard.php";
              else if (result.role === "enseignant") window.location.href = "views/enseignant_dashboard.html";
              else { msg.textContent = "⚠️ Rôle inconnu."; msg.style.color = "red"; }
            }, 1000);
          } else {
            msg.textContent = result.message || "❌ Numéro ou mot de passe incorrect.";
            msg.style.color = "red";
          }
        } catch (err) {
          msg.textContent = "⚠️ Impossible de contacter le serveur.";
          msg.style.color = "red";
        }
      });
    });

    // Affiche ou masque les informations de contact
    function showForgotInfo() {
      const forgotInfo = document.getElementById("forgotInfo");
      forgotInfo.style.display = forgotInfo.style.display === "none" || forgotInfo.style.display === "" ? "block" : "none";
    }
  </script>
</body>
</html>
