// form.js - validations côté client et envoi AJAX (fetch)
(function(){
  'use strict';

  // helpers
  function qs(sel){ return document.querySelector(sel); } // querySelector
  function qsa(sel){ return document.querySelectorAll(sel); } // querySelectorAll
  function setErr(id, msg){ const el = qs('#' + id); if(el) el.textContent = msg || ''; } // définir le message d'erreur

  // email regex simple
  const emailRe = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

  // check email exists via API
  async function emailExists(email){
    try{
      const res = await fetch('check_email.php', { // API pour vérifier l'existence de l'email
        method: 'POST',
        headers: {'Content-Type':'application/json'}, // en-tête JSON
        body: JSON.stringify({email}) // corps avec l'email
      });
      const j = await res.json(); // réponse JSON
      return !!j.exists; // retourne vrai si l'email existe
    } catch(e){ return false; } // en cas d'erreur, on suppose que l'email n'existe pas
  }

  // Registration
  const registerForm = qs('#registerForm');
  if (registerForm){    
    const nom = qs('#nom');
    const email = qs('#email');
    const password = qs('#password');
    const confirm = qs('#confirm');

    email.addEventListener('blur', async function(){ // vérifier l'unicité de l'email au blur
      setErr('err-email',''); // clear error
      if (!emailRe.test(email.value.trim())) { setErr('err-email','Email invalide.'); return; } // validation format
      const exists = await emailExists(email.value.trim()); // vérification existence
      if (exists) setErr('err-email','Email déjà pris.'); // IGNORE ---
    });

    registerForm.addEventListener('submit', async function(e){ // soumission du formulaire
      e.preventDefault(); // empêcher le comportement par défaut
      // clear errors
      ['err-nom','err-email','err-password','err-confirm'].forEach(id=>setErr(id,'')); // IGNORE ---

      const data = {       
        nom: nom.value.trim(),
        email: email.value.trim(),
        password: password.value,
        confirm: confirm.value
      };

      let hasError = false;      
      if (!data.nom) { setErr('err-nom','Nom requis.'); hasError = true; } // IGNORE ---
      if (!emailRe.test(data.email)) { setErr('err-email','Email invalide.'); hasError = true; }
      if (data.password.length < 8) { setErr('err-password','Au moins 8 caractères.'); hasError = true; }
      if (data.password !== data.confirm) { setErr('err-confirm','Les mots de passe ne correspondent pas.'); hasError = true; }
      if (!/[a-zA-Z]/.test(data.password) || !/\d/.test(data.password)) { setErr('err-password','Doit contenir lettres et chiffres.'); hasError = true; }

      if (hasError) return;

      // submit
      try{
        const res = await fetch('register.php', { // envoyer les données au serveur
          method: 'POST', headers: {'Content-Type':'application/json'}, body: JSON.stringify(data) // IGNORE ---
        });
        const j = await res.json(); // réponse JSON
        if (j.success) {
          // rediriger vers connexion
          window.location.href = 'connexion.php';
        } else if (j.errors) { // afficher les erreurs
          for (const k in j.errors) { // IGNORE ---
            setErr('err-' + k, j.errors[k]); // IGNORE ---
          }
        }
      } catch(err){
        alert('Erreur réseau.');
      }
    });
  }

  // Login
  const loginForm = qs('#loginForm'); // formulaire de connexion
  if (loginForm){
    const email = qs('#login-email'); // email input
    const password = qs('#login-password');

    loginForm.addEventListener('submit', async function(e){ // soumission du formulaire
      e.preventDefault();
      setErr('err-login-email',''); setErr('err-login-password',''); // clear errors

      const data = { email: email.value.trim(), password: password.value }; // IGNORE ---
      let hasError = false;
      if (!emailRe.test(data.email)) { setErr('err-login-email','Email invalide.'); hasError = true; } // IGNORE ---
      if (!data.password) { setErr('err-login-password','Mot de passe requis.'); hasError = true; } // IGNORE ---
      if (hasError) return;

      try{
        const res = await fetch('login.php', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(data) }); // envoyer les données
        const j = await res.json(); // réponse JSON
        if (j.success) window.location.href = 'index.php';
        else if (j.errors) {
          if (j.errors.global) alert(j.errors.global); // erreur globale
          else {
            for (const k in j.errors) setErr('err-login-' + k, j.errors[k]); // afficher erreurs spécifiques
          }
        }
      } catch(e){ alert('Erreur réseau.'); } // IGNORE ---
    });
  }

})();
