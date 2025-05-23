<?php
require_once 'config/database.php';

$success = '';
$error = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage des données
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Le nom est requis';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Veuillez entrer une adresse email valide';
    }
    
    if (empty($message)) {
        $errors[] = 'Le message est requis';
    }
    
    // Si aucune erreur, enregistrement en base de données
    if (empty($errors)) {
        $query = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $name, $email, $message);
        
        if ($stmt->execute()) {
            $success = 'Votre message a été envoyé avec succès !';
            // Réinitialisation des champs
            $name = $email = $message = '';
        } else {
            $error = 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.';
        }
    } else {
        $error = implode('<br>', $errors);
    }
}

$page_title = 'Contactez-moi';
require_once 'partials/header.php';
?>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Contactez-moi</h2>
            <p>N'hésitez pas à me contacter pour toute question ou opportunité de collaboration</p>
        </div>
        
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-card fade-in">
                    <i class="fas fa-envelope"></i>
                    <h3>Email</h3>
                    <a href="mailto:contact@monportfolio.com">contact@monportfolio.com</a>
                </div>
                
                <div class="contact-card fade-in">
                    <i class="fas fa-phone"></i>
                    <h3>Téléphone</h3>
                    <a href="tel:+33123456789">+33 1 23 45 67 89</a>
                </div>
                
                <div class="contact-card fade-in">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Localisation</h3>
                    <p>Paris, France</p>
                </div>
                
                <div class="social-links">
                    <a href="#" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="contact-form-container fade-in">
                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form id="contact-form" method="POST" action="contact.php" class="contact-form">
                    <div class="form-group">
                        <label for="name">Nom complet <span class="required">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" 
                               value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" class="form-control" rows="6" 
                                 required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
/* Styles spécifiques à la page de contact */
.contact-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 3rem;
    margin-top: 2rem;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.contact-card {
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: var(--box-shadow);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.contact-card i {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    display: inline-block;
}

.contact-card h3 {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.contact-card p,
.contact-card a {
    color: var(--text-light);
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-card a:hover {
    color: var(--primary-color);
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 1rem;
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #f5f5f5;
    border-radius: 50%;
    color: var(--dark-color);
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: var(--primary-color);
    color: #fff;
    transform: translateY(-3px);
}

.contact-form-container {
    background: #fff;
    padding: 2.5rem;
    border-radius: 10px;
    box-shadow: var(--box-shadow);
}

.required {
    color: #e74c3c;
    margin-left: 2px;
}

.alert {
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 5px;
    font-weight: 500;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Animation pour les éléments */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease-out forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Délai pour l'animation des cartes */
.contact-card:nth-child(1) { animation-delay: 0.1s; }
.contact-card:nth-child(2) { animation-delay: 0.2s; }
.contact-card:nth-child(3) { animation-delay: 0.3s; }
.contact-form-container { animation-delay: 0.4s; }

/* Responsive */
@media (max-width: 992px) {
    .contact-container {
        grid-template-columns: 1fr;
    }
    
    .contact-info {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .contact-card {
        flex: 1 1 250px;
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .contact-card {
        flex: 1 1 100%;
        max-width: 100%;
    }
    
    .contact-form-container {
        padding: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Vérifie au chargement de la page
    
    // Validation du formulaire côté client
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            
            // Réinitialiser les messages d'erreur
            document.querySelectorAll('.error-message').forEach(el => el.remove());
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            
            // Validation du nom
            if (name === '') {
                showError('name', 'Le nom est requis');
                isValid = false;
            }
            
            // Validation de l'email
            if (email === '') {
                showError('email', 'L\'email est requis');
                isValid = false;
            } else if (!isValidEmail(email)) {
                showError('email', 'Veuillez entrer une adresse email valide');
                isValid = false;
            }
            
            // Validation du message
            if (message === '') {
                showError('message', 'Le message est requis');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        field.classList.add('is-invalid');
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.style.color = '#e74c3c';
        errorDiv.style.fontSize = '0.85rem';
        errorDiv.style.marginTop = '0.25rem';
        errorDiv.textContent = message;
        
        field.parentNode.insertBefore(errorDiv, field.nextSibling);
    }
    
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
</script>

<?php require_once 'partials/footer.php'; ?>
