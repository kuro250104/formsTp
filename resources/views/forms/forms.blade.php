<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Sondage</title>
    <link href="../../../public/css/main.css" rel="stylesheet">
</head>
<body>

<nav>
    <div class="container">
        <div class="logo">Système de Sondage</div>
    </div>
</nav>

<section class="hero">
    <h1>Bienvenue sur notre système de sondage !</h1>
    <p>Créez, partagez et répondez aux sondages sur une variété de sujets !</p>
    <a href="create.blade.php" class="cta-button">Créer un sondage</a>
</section>

<section class="survey-list" id="survey-list">
    <h2>Sondages disponibles</h2>

    <div class="survey-cards">
        <div class="survey-card">
            <h3>Préférences Alimentaires</h3>
            <p>Partagez vos préférences culinaires ! Aidez-nous à mieux connaître vos goûts.</p>
            <div class="actions">
                <a href="#update-survey" class="update-answer-button">Modifier</a>
                <a href="#answer-survey" class="update-answer-button">Répondre</a>
            </div>
        </div>

        <div class="survey-card">
            <h3>Vos Vacances Idéales</h3>
            <p>Racontez-nous vos destinations de rêve et vos idées de vacances parfaites !</p>
            <div class="actions">
                <a href="#update-survey" class="update-answer-button">Modifier</a>
                <a href="#answer-survey" class="update-answer-button">Répondre</a>
            </div>
        </div>

        <div class="survey-card">
            <h3>Loisirs et Activités</h3>
            <p>Dites-nous ce que vous aimez faire pendant votre temps libre.</p>
            <div class="actions">
                <a href="#update-survey" class="update-answer-button">Modifier</a>
                <a href="#answer-survey" class="update-answer-button">Répondre</a>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2025 Système de Sondage. Tous droits réservés.</p>
</footer>

</body>
</html>
