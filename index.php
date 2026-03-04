<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HETEC BURKINA FASO – Plateforme Académique Numérique</title>
  <link rel="icon" href="img/hetec.jpg-2.webp" type="image/webp">

  <!-- ICONES -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- STYLES -->
  <style>
    :root {
      --primary: #0b3b6a;   /* Bleu institutionnel */
      --secondary: #c58a00; /* Or doré */
      --bg: #f8f9fb;
      --text: #222;
      --white: #fff;
    }

    @media (prefers-color-scheme: dark) {
      :root {
        --bg: #0e1117;
        --text: #eaeaea;
        --primary: #1a66b8;
        --secondary: #d9a404;
      }
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
      line-height: 1.6;
    }

    a { text-decoration: none; color: inherit; }

    /* ----- TOPBAR ----- */
    .topbar {
      background: var(--primary);
      color: var(--white);
      font-size: 0.9rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      flex-wrap: wrap;
      gap: 6px;
    }
    .topbar i {
      color: var(--secondary);
      margin-right: 6px;
    }

    /* ----- NAVIGATION ----- */
    nav {
      background: var(--white);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.08);
      flex-wrap: wrap;
    }

    .logo {
      font-size: 1.4rem;
      font-weight: bold;
      color: var(--primary);
    }

    .logo span {
      color: var(--secondary);
    }

    .nav-buttons {
      display: flex;
      gap: 12px;
    }

    .nav-buttons a {
      padding: 8px 14px;
      border-radius: 6px;
      font-weight: 500;
      border: 2px solid transparent;
      transition: 0.3s;
    }

    .btn-outline {
      border: 2px solid var(--primary);
      color: var(--primary);
    }
    .btn-outline:hover {
      background: var(--primary);
      color: var(--white);
    }

    .btn {
      background: var(--secondary);
      color: var(--white);
    }
    .btn:hover {
      background: #b07e00;
    }

    /* ----- HERO SECTION ----- */
    .hero {
      background: linear-gradient(135deg, var(--primary), #12497a, var(--secondary));
      color: var(--white);
      text-align: center;
      padding: 90px 25px 110px;
      background-size: 200% 200%;
      animation: bgMove 10s ease infinite;
      position: relative;
    }

    @keyframes bgMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .hero-content {
      max-width: 900px;
      margin: auto;
    }

    .hero h1 {
      font-size: 2.6rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.15rem;
      opacity: 0.95;
      margin-bottom: 30px;
    }

    .hero .btn-main {
      background: var(--white);
      color: var(--primary);
      padding: 12px 28px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
      display: inline-block;
    }

    .hero .btn-main:hover {
      background: var(--secondary);
      color: var(--white);
    }

    /* ----- SECTION PRESENTATION ----- */
    .presentation {
      text-align: center;
      padding: 70px 20px;
    }

    .presentation h2 {
      color: var(--primary);
      font-size: 2rem;
      margin-bottom: 18px;
    }

    .presentation p {
      max-width: 800px;
      margin: auto;
      color: #444;
      font-size: 1.05rem;
    }

    /* ----- SECTION ETUDIANT ----- */
    .etudiant {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      background-size: 300% 300%;
      animation: moveGradient 8s ease infinite;
      color: var(--white);
      text-align: center;
      padding: 60px 25px;
      border-radius: 16px;
      width: 90%;
      margin: 60px auto;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    @keyframes moveGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .etudiant img {
      width: 160px;
      margin-bottom: 15px;
      background: #fff;
      border-radius: 10px;
      padding: 5px;
    }

    .etudiant h3 {
      font-size: 1.5rem;
      margin-bottom: 8px;
    }

    .etudiant ul {
      list-style: none;
      padding-left: 0;
      display: inline-block;
      text-align: left;
      margin-top: 10px;
    }

    .etudiant li {
      margin: 5px 0;
    }

    .etudiant i {
      color: var(--secondary);
      margin-right: 6px;
    }

    /* ----- FOOTER ----- */
    footer {
      background: var(--primary);
      color: #eee;
      padding: 60px 25px 25px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 35px;
      margin-bottom: 25px;
    }

    footer img {
      width: 150px;
      border-radius: 6px;
      background: #fff;
      padding: 5px;
      margin-bottom: 15px;
    }

    footer h3 {
      color: var(--secondary);
      margin-bottom: 10px;
    }

    footer ul {
      list-style: none;
      padding-left: 0;
    }

    footer a {
      color: #fff;
      font-size: 0.95rem;
      transition: 0.3s;
    }

    footer a:hover {
      color: var(--secondary);
    }

    .social a {
      font-size: 1.3rem;
      margin-right: 10px;
    }

    .copy {
      text-align: center;
      font-size: 0.9rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 12px;
    }

    /* ----- BOUTON RETOUR HAUT ----- */
    #scrollTopBtn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background: var(--secondary);
      color: var(--white);
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      cursor: pointer;
      display: none;
      box-shadow: 0 3px 6px rgba(0,0,0,0.3);
    }

    #scrollTopBtn:hover {
      background: var(--primary);
    }

    /* ----- RESPONSIVE MOBILE ----- */
    @media (max-width: 768px) {
      .hero h1 { font-size: 1.9rem; }
      .hero p { font-size: 1rem; }
      nav { flex-direction: column; gap: 10px; text-align: center; }
      .nav-buttons { flex-direction: column; width: 100%; }
      .btn, .btn-outline { display: block; margin: 6px auto; width: 80%; }
      .presentation { padding: 50px 15px; }
      .etudiant { width: 95%; }
      .topbar { flex-direction: column; text-align: center; }
    }
  </style>
</head>
<body>
  <!-- BARRE SUPÉRIEURE -->
  <div class="topbar">
    <div><i class="fa fa-university"></i> HETEC Burkina Faso</div>
    <div><i class="fa fa-envelope"></i> scolarite@hetecburkina.net</div>
  </div>

  <!-- NAVIGATION -->
  <nav>
    <div class="logo">HETEC <span>BURKINA FASO</span></div>
    <div class="nav-buttons">
      <a href="views/portail.php" class="btn-outline">Portail étudiant</a>
      <a href="login.php" class="btn">Se connecter</a>
    </div>
  </nav>

  <!-- SECTION HERO -->
  <section class="hero">
    <div class="hero-content">
      <h1> GESTION NUMÉRIQUE DES DOCUMENTS ADMINISTRATIFS ET ACADÉMIQUES</h1>
      <p>HETEC BURKINA FASO est la plateforme académique qui permet aux étudiants, enseignants et à l’administration de gérer en ligne les documents académiques : cours, notes, correspondance, attestation d’inscription, d’admission, d’admissibilité et relevés de notes.</p>
      <a href="verification.html" class="btn-main">
        <i class="fa-solid fa-qrcode"></i> Vérifier un document officiel
      </a>
    </div>
  </section>

  <!-- SECTION PRESENTATION -->
  <section class="presentation">
    <h2>Une Innovation au Service de l’Éducation</h2>
    <p>HETEC Burkina Faso s'engage à digitaliser ses services académiques et administratifs pour offrir aux étudiants, enseignants et personnels un accès simple, rapide et sécurisé à leurs documents officiels. Cette plateforme incarne l’excellence et la modernisation de l’enseignement supérieur au Burkina Faso.</p>
  </section>

  <!-- SECTION ETUDIANT -->
  <section class="etudiant">
    <img src="img/photo.jpg" alt="Logo HETEC" />
    <h3>Espace Étudiant</h3>
    <p>Générez et vérifiez vos documents académiques en ligne :</p>
    <ul>
      <li><i class="fa fa-check"></i> Attestation d’inscription</li>
      <li><i class="fa fa-check"></i> Attestation d’admission</li>
      <li><i class="fa fa-check"></i> Relevé de notes</li>
      <li><i class="fa fa-check"></i> Vérification d’authenticité</li>
    </ul>
  </section>

  <!-- PIED DE PAGE -->
  <footer>
    <div class="footer-grid">
      <div>
        <img src="img/hetec.jpg-2.webp" alt="Logo HETEC" />
        <p><strong style="color: var(--secondary);">LA TRAJECTOIRE DE VOTRE RÉUSSITE,</strong><br>L'ÉCOLE DE VOTRE ENTREPRISE.</p>
      </div>
      <div>
        <h3>Liens rapides</h3>
        <ul>
          <li><a href="#">Attestation d'inscription</a></li>
          <li><a href="#">Attestation d'admission</a></li>
          <li><a href="#">Relevé de notes</a></li>
        </ul>
      </div>
      <div>
        <h3>Réseaux sociaux</h3>
        <div class="social">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div>
        <h3>Contactez-nous</h3>
        <p>📧 <a href="mailto:scolarite@hetecburkina.net">scolarite@hetecburkina.net</a></p>
        <p>📞 (+226) 56 15 00 00 <i class="fab fa-whatsapp" style="color: #25d366;"></i></p>
        <p>ou 63 42 99 99</p>
      </div>
    </div>

    <div class="copy">
      <p>© <span id="year"></span> HETEC BURKINA. Tous droits réservés.</p>
      <p style="color: var(--secondary)">Produit par <strong>HETEC BURKINA</strong></p>
    </div>
  </footer>

  <!-- BOUTON RETOUR EN HAUT -->
  <button id="scrollTopBtn" title="Retour en haut"><i class="fas fa-arrow-up"></i></button>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    window.addEventListener("scroll", () => {
      scrollTopBtn.style.display = window.scrollY > 250 ? "block" : "none";
    });
    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  </script>
</body>
</html>
