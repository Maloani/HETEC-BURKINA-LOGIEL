<script>
  const installCenterBtn = document.getElementById("installCenterBtn");

  installCenterBtn.addEventListener("click", async () => {
    if (deferredPrompt) {
      deferredPrompt.prompt();
      const { outcome } = await deferredPrompt.userChoice;
      if (outcome === "accepted") {
        console.log("✅ Application installée via le bouton central !");
      } else {
        console.log("❌ Installation refusée.");
      }
      deferredPrompt = null;
    } else {
      alert("⚠️ L’installation n’est pas encore disponible. Essayez dans quelques secondes.");
    }
  });
</script>
