<?php
require_once 'config/database.php';
require_once 'partials/header.php';
?>

<main>
    <!-- Section Héro -->
    <section class="hero">
        <div class="container">
            <h1>Bienvenue sur mon Portfolio</h1>
            <p class="lead">Développeur Web passionné par la création d'expériences numériques exceptionnelles</p>
            <a href="#projects" class="btn btn-primary">Voir mes projets</a>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="section">
        <div class="container">
            <h2>À propos de moi</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Je suis un développeur web passionné avec une expertise en création de sites web modernes et réactifs.</p>
                    <a href="about.php" class="btn btn-secondary">En savoir plus</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projects" class="section">
        <div class="container">
            <h2>Mes Projets Récents</h2>
            <div class="projects-grid">
                <?php
                $query = "SELECT * FROM projects ORDER BY created_at DESC LIMIT 3";
                $result = $conn->query($query);
                
                if ($result->num_rows > 0) {
                    while($project = $result->fetch_assoc()) {
                        echo '<div class="project-card">';
                        echo '<img src="' . htmlspecialchars($project['image_url']) . '" alt="' . htmlspecialchars($project['title']) . '">';
                        echo '<h3>' . htmlspecialchars($project['title']) . '</h3>';
                        echo '<p>' . substr(htmlspecialchars($project['description']), 0, 100) . '...</p>';
                        echo '<a href="project_detail.php?id=' . $project['id'] . '" class="btn btn-small">Voir plus</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Aucun projet à afficher pour le moment.</p>';
                }
                ?>
            </div>
            <div class="text-center">
                <a href="projects.php" class="btn btn-primary">Voir tous les projets</a>
            </div>
        </div>
    </section>

    <!-- Section Compétences -->
    <section id="skills" class="section">
        <div class="container">
            <h2>Mes Compétences</h2>
            <div class="skills-container">
                <div class="skill-category">
                    <h3>Front-end</h3>
                    <ul>
                        <li>HTML5 & CSS3</li>
                        <li>JavaScript (ES6+)</li>
                        <li>jQuery</li>
                        <li>React.js</li>
                    </ul>
                </div>
                <div class="skill-category">
                    <h3>Back-end</h3>
                    <ul>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>Node.js</li>
                    </ul>
                </div>
            </div>
            <div class="text-center">
                <a href="skills.php" class="btn btn-secondary">En savoir plus</a>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="section">
        <div class="container">
            <h2>Contactez-moi</h2>
            <div class="contact-content">
                <p>Vous avez un projet en tête ? N'hésitez pas à me contacter !</p>
                <a href="contact.php" class="btn btn-primary">Me contacter</a>
            </div>
        </div>
    </section>
</main>

<?php require_once 'partials/footer.php'; ?>
