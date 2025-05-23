document.addEventListener('DOMContentLoaded', function() {
    // Menu mobile
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('nav ul');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            navMenu.classList.toggle('show');
            this.classList.toggle('active');
        });
    }

    // Fermer le menu mobile lors du clic sur un lien
    const navLinks = document.querySelectorAll('nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu.classList.contains('show')) {
                navMenu.classList.remove('show');
                mobileMenuBtn.classList.remove('active');
            }
        });
    });

    // Animation au défilement
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.fade-in');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;
            
            if (elementPosition < screenPosition) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    // Détection du défilement
    window.addEventListener('scroll', animateOnScroll);
    
    // Animation initiale
    animateOnScroll();

    // Gestion du formulaire de contact
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Récupération des données du formulaire
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            // Désactivation du bouton pendant l'envoi
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Envoi en cours...';
            
            // Envoi des données via Fetch API
            fetch('send_email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Affichage du message de succès
                    const successMessage = document.createElement('div');
                    successMessage.className = 'alert alert-success';
                    successMessage.textContent = 'Votre message a été envoyé avec succès !';
                    
                    // Insertion du message avant le formulaire
                    contactForm.parentNode.insertBefore(successMessage, contactForm);
                    
                    // Réinitialisation du formulaire
                    contactForm.reset();
                    
                    // Suppression du message après 5 secondes
                    setTimeout(() => {
                        successMessage.remove();
                    }, 5000);
                } else {
                    // Affichage du message d'erreur
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'alert alert-error';
                    errorMessage.textContent = 'Une erreur est survenue. Veuillez réessayer.';
                    
                    // Insertion du message avant le formulaire
                    contactForm.parentNode.insertBefore(errorMessage, contactForm);
                    
                    // Suppression du message après 5 secondes
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 5000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Affichage du message d'erreur
                const errorMessage = document.createElement('div');
                errorMessage.className = 'alert alert-error';
                errorMessage.textContent = 'Une erreur est survenue. Veuillez réessayer plus tard.';
                
                // Insertion du message avant le formulaire
                contactForm.parentNode.insertBefore(errorMessage, contactForm);
                
                // Suppression du message après 5 secondes
                setTimeout(() => {
                    errorMessage.remove();
                }, 5000);
            })
            .finally(() => {
                // Réactivation du bouton
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            });
        });
    }

    // Animation des compétences
    const skillBars = document.querySelectorAll('.skill-level');
    
    const animateSkills = () => {
        skillBars.forEach(bar => {
            const width = bar.getAttribute('data-level');
            bar.style.width = '0';
            
            // Délai pour déclencher l'animation
            setTimeout(() => {
                bar.style.width = width;
            }, 100);
        });
    };
    
    // Vérifie si les barres de compétences sont visibles
    const checkSkills = () => {
        skillBars.forEach(bar => {
            const barPosition = bar.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;
            
            if (barPosition < screenPosition) {
                animateSkills();
                window.removeEventListener('scroll', checkSkills);
            }
        });
    };
    
    // Écouteur d'événement pour l'animation des compétences
    if (skillBars.length > 0) {
        window.addEventListener('scroll', checkSkills);
        checkSkills(); // Vérifie au chargement de la page
    }
    
    // Smooth scroll pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80, // Ajuste pour le header fixe
                    behavior: 'smooth'
                });
                
                // Fermer le menu mobile si ouvert
                if (navMenu && navMenu.classList.contains('show')) {
                    navMenu.classList.remove('show');
                    mobileMenuBtn.classList.remove('active');
                }
            }
        });
    });
});

// Gestion du chargement paresseux des images
if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
        img.src = img.dataset.src;
    });
} else {
    // Fallback pour les navigateurs qui ne prennent pas en charge le chargement paresseux
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
    document.body.appendChild(script);
}
