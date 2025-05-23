<?php
$page_title = 'À propos de moi';
require_once 'partials/header.php';
?>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>À propos de moi</h2>
            <p>Développeur web passionné par la création d'expériences numériques innovantes</p>
        </div>

        <div class="about-content">
            <div class="about-image fade-in">
                <img src="images/profile-placeholder.jpg" alt="Photo de profil" id="profile-pic" loading="lazy">
            </div>
            
            <div class="about-text fade-in" style="animation-delay: 0.2s;">
                <h2>Qui suis-je ?</h2>
                <p>Je suis un développeur web passionné par la création d'applications web modernes et performantes. Avec une solide expérience en développement front-end et back-end, j'aime relever des défis techniques et créer des solutions élégantes.</p>
                
                <p>Ma passion pour le code a commencé il y a plusieurs années et ne cesse de grandir. Je suis constamment à la recherche de nouvelles technologies et de bonnes pratiques pour améliorer mes compétences.</p>
                
                <div class="personal-info">
                    <div class="info-item">
                        <span class="info-label">Nom :</span>
                        <span class="info-value">[Votre Nom]</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email :</span>
                        <a href="mailto:contact@votresite.com" class="info-value">contact@votresite.com</a>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Téléphone :</span>
                        <a href="tel:+33612345678" class="info-value">+33 6 12 34 56 78</a>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Localisation :</span>
                        <span class="info-value">Ville, Pays</span>
                    </div>
                </div>
                
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-primary">Me contacter</a>
                    <a href="#" class="btn btn-secondary" id="download-cv" target="_blank">Télécharger mon CV</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Mon parcours</h2>
            <p>Mon expérience professionnelle et ma formation</p>
        </div>

        <div class="timeline">
            <div class="timeline-item fade-in">
                <div class="timeline-date">2022 - Présent</div>
                <div class="timeline-content">
                    <h3>Développeur Full Stack</h3>
                    <h4>Nom de l'entreprise, Ville</h4>
                    <p>Développement et maintenance d'applications web avec React, Node.js et MongoDB. Gestion de projets complets du cahier des charges à la mise en production.</p>
                </div>
            </div>
            
            <div class="timeline-item fade-in" style="animation-delay: 0.2s;">
                <div class="timeline-date">2020 - 2022</div>
                <div class="timeline-content">
                    <h3>Développeur Front-end</h3>
                    <h4>Autre entreprise, Ville</h4>
                    <p>Création d'interfaces utilisateur réactives et accessibles. Collaboration avec les designers pour transformer des maquettes en code fonctionnel.</p>
                </div>
            </div>
            
            <div class="timeline-item fade-in" style="animation-delay: 0.4s;">
                <div class="timeline-date">2018 - 2020</div>
                <div class="timeline-content">
                    <h3>Formation Développeur Web</h3>
                    <h4>École ou formation, Ville</h4>
                    <p>Formation intensive en développement web couvrant HTML, CSS, JavaScript, PHP et les bases de données. Réalisation de plusieurs projets pratiques.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Mes compétences techniques</h2>
            <p>Un aperçu de mes compétences et technologies maîtrisées</p>
        </div>

        <div class="skills-container">
            <div class="skill-category fade-in">
                <h3>Développement Front-end</h3>
                <ul>
                    <li>HTML5 & CSS3</li>
                    <li>JavaScript (ES6+)</li>
                    <li>React.js</li>
                    <li>jQuery</li>
                    <li>Bootstrap</li>
                    <li>Responsive Design</li>
                </ul>
            </div>
            
            <div class="skill-category fade-in" style="animation-delay: 0.2s;">
                <h3>Développement Back-end</h3>
                <ul>
                    <li>PHP</li>
                    <li>Node.js</li>
                    <li>Express.js</li>
                    <li>API REST</li>
                    <li>MySQL</li>
                    <li>MongoDB</li>
                </ul>
            </div>
            
            <div class="skill-category fade-in" style="animation-delay: 0.4s;">
                <h3>Outils & Méthodologies</h3>
                <ul>
                    <li>Git & GitHub</li>
                    <li>Webpack</li>
                    <li>Méthodes Agiles</li>
                    <li>SEO</li>
                    <li>UI/UX Design</li>
                    <li>Déploiement</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Pourquoi me choisir ?</h2>
            <p>Ce qui me distingue des autres développeurs</p>
        </div>

        <div class="features-grid">
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3>Code Propre</h3>
                <p>J'écris un code propre, bien structuré et commenté pour une maintenance facile.</p>
            </div>
            
            <div class="feature-card fade-in" style="animation-delay: 0.2s;">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Design Responsive</h3>
                <p>Je crée des sites qui s'adaptent parfaitement à tous les appareils.</p>
            </div>
            
            <div class="feature-card fade-in" style="animation-delay: 0.4s;">
                <div class="feature-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Performances</h3>
                <p>J'optimise les performances pour des temps de chargement rapides.</p>
            </div>
            
            <div class="feature-card fade-in" style="animation-delay: 0.6s;">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>SEO</h3>
                <p>Je m'assure que votre site est optimisé pour les moteurs de recherche.</p>
            </div>
        </div>
    </div>
</section>

<style>
/* Styles spécifiques à la page À propos */
.about-content {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 4rem;
    align-items: flex-start;
}

.about-image {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    height: 100%;
    max-height: 500px;
}

.about-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.about-image:hover img {
    transform: scale(1.03);
}

.about-text h2 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 1rem;
}

.about-text h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 3px;
    background: #3498db;
}

.about-text p {
    margin-bottom: 1.5rem;
    color: #7f8c8d;
    line-height: 1.8;
    font-size: 1.05rem;
}

.personal-info {
    margin: 2rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.info-item {
    margin-bottom: 0.8rem;
}

.info-label {
    font-weight: 600;
    color: #2c3e50;
    margin-right: 0.5rem;
}

.info-value, .info-value a {
    color: #7f8c8d;
    text-decoration: none;
    transition: color 0.3s ease;
}

.info-value a:hover {
    color: #3498db;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

/* Timeline */
.timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem 0;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 2px;
    background: #3498db;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -1px;
}

.timeline-item {
    padding: 20px 40px;
    position: relative;
    width: 50%;
    box-sizing: border-box;
}

.timeline-item:nth-child(odd) {
    left: 0;
}

.timeline-item:nth-child(even) {
    left: 50%;
}

.timeline-date {
    padding: 0.5rem 1rem;
    background: #3498db;
    color: white;
    border-radius: 20px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1rem;
}

.timeline-content {
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    position: relative;
}

.timeline-content::after {
    content: '';
    position: absolute;
    border-style: solid;
    width: 20px;
    height: 20px;
    top: 30px;
    z-index: 1;
}

.timeline-item:nth-child(odd) .timeline-content::after {
    right: -10px;
    border-width: 10px 0 10px 20px;
    border-color: transparent transparent transparent white;
}

.timeline-item:nth-child(even) .timeline-content::after {
    left: -10px;
    border-width: 10px 20px 10px 0;
    border-color: transparent white transparent transparent;
}

.timeline-content h3 {
    margin: 0 0 0.5rem 0;
    color: #2c3e50;
    font-size: 1.3rem;
}

.timeline-content h4 {
    margin: 0 0 1rem 0;
    color: #3498db;
    font-size: 1rem;
    font-weight: 500;
}

.timeline-content p {
    margin: 0;
    color: #7f8c8d;
    line-height: 1.6;
}

/* Skills */
.skills-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.skill-category {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.skill-category:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.skill-category h3 {
    color: #3498db;
    margin-bottom: 1.5rem;
    text-align: center;
    font-size: 1.4rem;
    position: relative;
    padding-bottom: 1rem;
}

.skill-category h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: #3498db;
}

.skill-category ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.skill-category ul li {
    padding: 0.8rem 0;
    border-bottom: 1px solid #eee;
    color: #555;
    position: relative;
    padding-left: 25px;
}

.skill-category ul li:last-child {
    border-bottom: none;
}

.skill-category ul li::before {
    content: '▹';
    position: absolute;
    left: 0;
    color: #3498db;
    font-size: 1.2rem;
    line-height: 1;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.feature-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.8rem;
    color: #3498db;
}

.feature-card h3 {
    color: #2c3e50;
    margin-bottom: 1rem;
    font-size: 1.3rem;
}

.feature-card p {
    color: #7f8c8d;
    margin: 0;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 992px) {
    .about-content {
        grid-template-columns: 1fr;
    }
    
    .about-image {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .personal-info {
        grid-template-columns: 1fr;
    }
    
    .timeline::before {
        left: 31px;
    }
    
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 0;
    }
    
    .timeline-item:nth-child(even) {
        left: 0;
    }
    
    .timeline-item:nth-child(odd) .timeline-content::after,
    .timeline-item:nth-child(even) .timeline-content::after {
        left: 19px;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
    }
}

@media (max-width: 768px) {
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons .btn {
        width: 100%;
        text-align: center;
    }
    
    .timeline-content {
        padding: 1.5rem;
    }
    
    .skills-container {
        grid-template-columns: 1fr;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in {
    opacity: 0;
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Background sections */
.bg-light {
    background-color: #f9f9f9;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 0.8rem 1.8rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    text-align: center;
}

.btn-primary {
    background-color: #3498db;
    color: white;
    border: 2px solid #3498db;
}

.btn-primary:hover {
    background-color: #2980b9;
    border-color: #2980b9;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: transparent;
    color: #3498db;
    border: 2px solid #3498db;
}

.btn-secondary:hover {
    background-color: rgba(52, 152, 219, 0.1);
    transform: translateY(-2px);
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
    
    // Gestion du téléchargement du CV
    const downloadCvBtn = document.getElementById('download-cv');
    if (downloadCvBtn) {
        downloadCvBtn.addEventListener('click', function(e) {
            // Vérifier si le CV existe
            fetch('cv.pdf')
                .then(response => {
                    if (!response.ok) {
                        e.preventDefault();
                        alert('Le CV n\'est pas disponible pour le moment. Veuillez me contacter directement.');
                    }
                })
                .catch(() => {
                    e.preventDefault();
                    alert('Le CV n\'est pas disponible pour le moment. Veuillez me contacter directement.');
                });
        });
    }
});
</script>

<?php require_once 'partials/footer.php'; ?>