(function(){
  // Séquence Konami moderne (utilise les key values) : ArrowUp, ArrowUp, ArrowDown, ArrowDown, ArrowLeft, ArrowRight, ArrowLeft, ArrowRight, b, a
  const konami = ['ArrowUp','ArrowUp','ArrowDown','ArrowDown','ArrowLeft','ArrowRight','ArrowLeft','ArrowRight','b','a'];
  let position = 0;

  // Helper : afficher toast
  function showToast(msg, duration = 2200){ // durée par défaut 2.2s
    const el = document.getElementById('lp-toast'); // Récupère l'élément toast
    if(!el) return;
    el.textContent = msg; // Définit le message
    el.classList.add('show'); // Ajoute la classe pour afficher le toast
    el.setAttribute('aria-hidden','false'); // Met à jour l'attribut aria-hidden
    setTimeout(()=>{el.classList.remove('show');el.setAttribute('aria-hidden','true');}, duration); // Retire le toast après la durée spécifiée
  }

  // Activation du thème
  function activateTheme(){
    if(document.body.classList.contains('lp-theme')) return; // déjà activé
    document.body.classList.add('lp-theme'); // active le thème

    // ajout d'un badge et confetti visuel
    const container = document.querySelector('.container') || document.body; // conteneur cible
    const badge = document.createElement('div'); // crée le badge
    badge.className = 'lp-badge'; // classe du badge
    badge.textContent = 'La Plateforme_ activée'; // texte du badge
    container.appendChild(badge); // ajoute le badge au conteneur

    const conf = document.createElement('div'); // crée le confetti
    conf.className = 'lp-confetti'; // classe du confetti
    conf.id = 'lp-confetti'; // identifiant du confetti
    document.body.appendChild(conf); // ajoute le confetti au body

    // retirer confetti après 6s
    setTimeout(()=>{
      conf.remove();
    }, 6000);

    showToast('Mode La Plateforme_ activé !');
  }

  // Écoute clavier
  window.addEventListener('keydown', function(e){ // écoute les touches
    const key = e.key; // récupère la touche pressée
    console.log(key);   
    if(key === konami[position]){ // si la touche est correcte
      position++; // avance dans la séquence
      if(position === konami.length){ // si la séquence est complète
        activateTheme(); // active le thème
        console.log('Thème activé');
        position = 0;
      }
    } else {
      // si la touche n'est pas bonne, on réinitialise intelligemment :
      // si la touche est la première de la séquence, position = 1 else 0
      position = (key === konami[0]) ? 1 : 0;
    }
  });

  // Support tactile : détecte un geste 'secret' si l'utilisateur appuie 5 fois rapidement
  (function touchSecret(){
    let taps = 0; let last = 0;
    window.addEventListener('touchend', function(){
      const now = Date.now();
      if(now - last < 600){ taps++; } else { taps = 1; }
      last = now;
      if(taps >= 5){ activateTheme(); taps = 0; }
    });
  })();
})();
