// ==============================
// 🔹 Configuration du cache
// ==============================
const CACHE_NAME = "hetec-cache-v2"; // 🔁 Change le numéro à chaque mise à jour
const urlsToCache = [
  "/hetec_administration/",
  "/hetec_administration/index.html",
  "/hetec_administration/manifest.json",
  "/hetec_administration/img/hetec.jpg-2.webp",
  "/hetec_administration/css/style.css",
  "/hetec_administration/js/app.js"
];

// ==============================
// 📦 Installation du Service Worker
// ==============================
self.addEventListener("install", (event) => {
  console.log("📦 Installation du Service Worker...");
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log("✅ Mise en cache initiale des fichiers...");
        return cache.addAll(urlsToCache);
      })
  );
  // ⚡ Active immédiatement la nouvelle version
  self.skipWaiting();
});

// ==============================
// ⚙️ Activation du Service Worker
// ==============================
self.addEventListener("activate", (event) => {
  console.log("⚙️ Activation du nouveau Service Worker...");
  event.waitUntil(
    caches.keys().then((cacheNames) =>
      Promise.all(
        cacheNames.map((name) => {
          if (name !== CACHE_NAME) {
            console.log("🧹 Suppression de l'ancien cache :", name);
            return caches.delete(name);
          }
        })
      )
    ).then(() => self.clients.claim())
  );
});

// ==============================
// 🌐 Interception des requêtes réseau
// ==============================
self.addEventListener("fetch", (event) => {
  // ⚠️ Évite de mettre en cache les requêtes vers Chrome Extension ou API
  if (event.request.url.startsWith('chrome-extension') || event.request.method !== 'GET') {
    return;
  }

  event.respondWith(
    caches.match(event.request).then((response) => {
      // 🔁 Retourne le cache ou fait une requête réseau
      const fetchRequest = fetch(event.request).then((networkResponse) => {
        // Met à jour le cache si la réponse est valide
        if (
          networkResponse &&
          networkResponse.status === 200 &&
          networkResponse.type === "basic"
        ) {
          const responseToCache = networkResponse.clone();
          caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, responseToCache);
          });
        }
        return networkResponse;
      }).catch(() => {
        // Mode hors ligne
        return caches.match("/hetec_administration/index.html");
      });

      return response || fetchRequest;
    })
  );
});

// ==============================
// 🔁 Forcer la mise à jour des clients
// ==============================
self.addEventListener("message", (event) => {
  if (event.data === "skipWaiting") {
    console.log("🔄 Activation immédiate du nouveau SW");
    self.skipWaiting();
  }
});
