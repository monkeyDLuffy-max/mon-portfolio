<?php
require_once 'config/database.php';

// Vérifier si un ID de projet est fourni dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: projects.php');
    exit();
}

$project_id = (int)$_GET['id'];

// Récupérer les détails du projet depuis la base de données
$query = "SELECT * FROM projects WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $project_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Rediriger si le projet n'existe pas
    header('Location: projects.php');
    exit();
}

$project = $result->fetch_assoc();

// Récupérer les projets connexes (exclure le projet actuel)
$related_query = "SELECT * FROM projects WHERE id != ? ORDER BY created_at DESC LIMIT 3";
$stmt = $conn->prepare($related_query);
$stmt->bind_param('i', $project_id);
$stmt->execute();
$related_projects = $stmt->get_result();

$page_title = $project['title'] . ' - Détails du projet';
require_once 'partials/header.php';
?>

<div class="container">
    <a href="projects.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Retour aux projets
    </a>
    
    <article class="project-detail">
        <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
        
        <div class="project-info">
            <h1><?php echo htmlspecialchars($project['title']); ?></h1>
            
            <div class="project-meta">
                <span><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($project['created_at'])); ?></span>
                <?php if (!empty($project['technologies'])): ?>
                <span><i class="fas fa-tags"></i> <?php echo htmlspecialchars($project['technologies']); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="project-description">
                <?php echo nl2br(htmlspecialchars($project['description'])); ?>
            </div>
            
            <?php if (!empty($project['project_url'])): ?>
            <a href="<?php echo htmlspecialchars($project['project_url']); ?>" class="btn" target="_blank" rel="noopener noreferrer">
                <i class="fas fa-external-link-alt"></i> Voir le projet
            </a>
            <?php endif; ?>
            
            <?php if (!empty($project['github_url'])): ?>
            <a href="<?php echo htmlspecialchars($project['github_url']); ?>" class="btn btn-secondary" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-github"></i> Code source
            </a>
            <?php endif; ?>
        </div>
    </article>
    
    <?php if ($related_projects->num_rows > 0): ?>
    <section class="related-projects">
        <h2>Autres projets qui pourraient vous intéresser</h2>
        <div class="projects-grid">
            <?php while ($related = $related_projects->fetch_assoc()): ?>
            <div class="project-card fade-in">
                <img src="<?php echo htmlspecialchars($related['image_url']); ?>" alt="<?php echo htmlspecialchars($related['title']); ?>">
                <h3><?php echo htmlspecialchars($related['title']); ?></h3>
                <p><?php echo substr(htmlspecialchars($related['description']), 0, 100); ?>...</p>
                <a href="project_detail.php?id=<?php echo $related['id']; ?>" class="btn btn-small">Voir plus</a>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php require_once 'partials/footer.php'; ?>
