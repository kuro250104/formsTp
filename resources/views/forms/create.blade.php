<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Sondage</title>
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/create.css') }}" rel="stylesheet">
</head>
<body>

<nav>
    <div class="container">
        <div class="logo">Système de Sondage</div>
        <a href="{{ route('forms.index') }}">Retour</a>
    </div>
</nav>

<section class="create-survey">
    <h1>Créer un Nouveau Sondage</h1>
    <form action="{{ route('forms.store') }}" method="POST" id="survey-form">
        @csrf

        <label for="title">Titre du sondage :</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <div id="questions-container">
            <h2>Questions</h2>
            <div class="question">
                <input type="text" name="questions[]" placeholder="Entrez une question" required>
                <select name="types[]" class="question-type">
                    <option value="text">Réponse libre</option>
                    <option value="multiple">Choix multiple</option>
                </select>
                <div class="answers" style="display: none;">
                    <h3>Réponses possibles :</h3>
                    <div class="answer">
                        <input type="text" name="answers[0][]" placeholder="Entrez une réponse">
                        <button type="button" class="remove-answer">Supprimer</button>
                    </div>
                    <button type="button" class="add-answer">Ajouter une Réponse</button>
                </div>
                <button type="button" class="remove-question">Supprimer</button>
            </div>
        </div>

        <button type="button" id="add-question">Ajouter une Question</button>
        <button type="submit">Créer le Sondage</button>
    </form>
</section>

<script>
    document.getElementById('add-question').addEventListener('click', function () {
        let container = document.getElementById('questions-container');
        let questionIndex = document.querySelectorAll('.question').length;
        let questionDiv = document.createElement('div');
        questionDiv.classList.add('question');
        questionDiv.innerHTML = `
            <input type="text" name="questions[]" placeholder="Entrez une question" required>
            <select name="types[]" class="question-type">
                <option value="text">Réponse libre</option>
                <option value="multiple">Choix multiple</option>
            </select>
            <div class="answers" style="display: none;">
                <h3>Réponses possibles :</h3>
                <div class="answer">
                    <input type="text" name="answers[${questionIndex}][]" placeholder="Entrez une réponse">
                    <button type="button" class="remove-answer">Supprimer</button>
                </div>
                <button type="button" class="add-answer">Ajouter une Réponse</button>
            </div>
            <button type="button" class="remove-question">Supprimer</button>
        `;
        container.appendChild(questionDiv);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-question')) {
            e.target.parentElement.remove();
        }
        if (e.target.classList.contains('remove-answer')) {
            e.target.parentElement.remove();
        }
        if (e.target.classList.contains('add-answer')) {
            let questionIndex = Array.from(document.querySelectorAll('.question')).indexOf(e.target.closest('.question'));
            let answerDiv = document.createElement('div');
            answerDiv.classList.add('answer');
            answerDiv.innerHTML = `
                <input type="text" name="answers[${questionIndex}][]" placeholder="Entrez une réponse">
                <button type="button" class="remove-answer">Supprimer</button>
            `;
            e.target.parentElement.insertBefore(answerDiv, e.target);
        }
    });

    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('question-type')) {
            let answersDiv = e.target.parentElement.querySelector('.answers');
            if (e.target.value === 'multiple') {
                answersDiv.style.display = 'block';
            } else {
                answersDiv.style.display = 'none';
            }
        }
    });

</script>

</body>
</html>
