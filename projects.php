<?php
require_once 'config/database.php';

// Récupérer tous les projets depuis la base de données
$query = "SELECT * FROM projects ORDER BY created_at DESC";
$result = $conn->query($query);

$page_title = 'Mes Projets';
require_once 'partials/header.php';
?>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Mes Projets</h2>
            <p>Découvrez une sélection de mes projets réalisés</p>
        </div>
        
        <div class="filters">
            <button class="btn btn-small active" data-filter="all">Tous</button>
            <button class="btn btn-small" data-filter="web">Web</button>
            <button class="btn btn-small" data-filter="mobile">Mobile</button>
            <button class="btn btn-small" data-filter="design">Design</button>
        </div>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="projects-grid">
                <?php while ($project = $result->fetch_assoc()): ?>
                    <div class="project-card fade-in" data-category="<?php echo strtolower(explode(',', $project['technologies'])[0] ?? 'web'); ?>">
                        <div class="project-image">
                            <img src="<?php echo htmlspecialchars($project['image_url']); ?>" 
                                 alt="<?php echo htmlspecialchars($project['title']); ?>"
                                 loading="lazy">
                            <div class="project-overlay">
                                <a href="project_detail.php?id=<?php echo $project['id']; ?>" class="btn btn-small">Voir le projet</a>
                            </div>
                        </div>
                        <div class="project-info">
                            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                            <div class="project-technologies">
                                <?php 
                                $technologies = explode(',', $project['technologies']);
                                foreach ($technologies as $tech): 
                                ?>
                                    <span class="tech-tag"><?php echo htmlspecialchars(trim($tech)); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <p><?php echo substr(htmlspecialchars($project['description']), 0, 100); ?>...</p>
                            <a href="project_detail.php?id=<?php echo $project['id']; ?>" class="btn btn-small">En savoir plus</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-projects">
                <i class="fas fa-folder-open fa-4x"></i>
                <h3>Aucun projet à afficher pour le moment</h3>
                <p>Revenez bientôt pour découvrir mes nouveaux projets !</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
/* Styles spécifiques à la page des projets */
.filters {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 2rem;
    justify-content: center;
}

.filters .btn-small {
    margin: 0;
    padding: 0.4rem 1rem;
    background: #f1f1f1;
    color: #333;
    border: none;
    transition: all 0.3s ease;
}

.filters .btn-small.active,
.filters .btn-small:hover {
    background: var(--primary-color);
    color: #fff;
}

.project-card {
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-image {
    position: relative;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    height: 200px;
}

.project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.project-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-card:hover .project-image img {
    transform: scale(1.05);
}

.project-info {
    padding: 1.5rem;
    background: #fff;
    border-radius: 0 0 8px 8px;
}

.project-info h3 {
    margin-bottom: 0.5rem;
    color: var(--dark-color);
}

.project-technologies {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin: 0.5rem 0 1rem;
}

.tech-tag {
    background: #f1f1f1;
    color: #555;
    padding: 0.2rem 0.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 500;
}

.no-projects {
    text-align: center;
    padding: 4rem 2rem;
    background: #f9f9f9;
    border-radius: 8px;
    margin-top: 2rem;
}

.no-projects i {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.no-projects h3 {
    margin-bottom: 0.5rem;
    color: var(--dark-color);
}

.no-projects p {
    color: var(--text-light);
}

/* Animation pour les cartes de projets */
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
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

/* Délai pour l'animation des cartes */
.projects-grid .project-card:nth-child(1) { animation-delay: 0.1s; }
.projects-grid .project-card:nth-child(2) { animation-delay: 0.2s; }
.projects-grid .project-card:nth-child(3) { animation-delay: 0.3s; }
.projects-grid .project-card:nth-child(4) { animation-delay: 0.4s; }
.projects-grid .project-card:nth-child(5) { animation-delay: 0.5s; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtrage des projets
    const filterButtons = document.querySelectorAll('.filters .btn');
    const projectCards = document.querySelectorAll('.project-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Mettre à jour les boutons actifs
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            const filter = button.getAttribute('data-filter');
            
            // Filtrer les projets
            projectCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    // Réinitialiser l'animation
                    card.style.animation = 'none';
                    card.offsetHeight; // Déclenche un reflow
                    card.style.animation = 'fadeInUp 0.6s ease-out forwards';
                } else {
                    card.style.display = 'none';
                }
            });
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
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Vérifie au chargement de la page
});
</script>

<?php require_once 'partials/footer.php'; ?>
