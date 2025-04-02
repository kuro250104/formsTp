<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Sondage</title>
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
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
    <a href="{{ route('forms.create') }}" class="cta-button">Créer un sondage</a>
</section>

<section class="survey-list" id="survey-list">
    <h2>Sondages disponibles</h2>

    <div class="survey-cards">
        @if($forms->isEmpty())
            <p>Aucun sondage disponible pour le moment.</p>
        @else
            @foreach($forms as $form)
                <div class="survey-card">
                    <h3>{{ $form->title }}</h3>
                    <p>{{ $form->description }}</p>
                    <div class="actions">
                        <a href="{{ route('forms.edit', $form->id) }}" class="update-answer-button">Modifier</a>
                        <a href="{{ route('forms.show', $form->id) }}" class="update-answer-button">Répondre</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
</body>

<footer>
    <p>&copy; 2025 Système de Sondage. Tous droits réservés.</p>
</footer>

</html>
