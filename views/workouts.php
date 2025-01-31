<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Wise - Treinos</title>
    <link rel="stylesheet" href="/workout-wise/assets/css/reset.css">
    <link rel="stylesheet" href="/workout-wise/assets/css/workouts.css">
    <script type="module" defer src="/workout-wise/assets/js/workout.js"></script>
</head>
<body>
    
    <main>

        <h1 id="title">Cadastre Seus Treinos</h1>

        <div class="form-wrapper workout-name">
            <p>Este nome será o identificador para seus treinos na hora de análise.</p>
            <label for="name">Nome(tipo)</label>
            <input type="text" name="name" id="name">
        </div>

        <form action="" id="form-workout">

            <section id="treino">

                <div class="form-wrapper">
                    <label for="exercise">Exercício</label>
                    <select name="exercise" id="exercise">
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-wrapper">
                    <label for="series">Quantidade de Séries</label>
                    <input type="number" name="series" id="series">
                </div>

                <div class="form-wrapper">
                    <label for="reps">Quantidade de Repetições</label>
                    <input type="number" name="reps" id="reps">
                </div>

                <div class="form-wrapper">
                    <label for="weight">Peso</label>
                    <input type="number" name="weight" id="weight">
                </div>

                <button id="delete-btn" type="button" class="delete-btn">
                    Deletar
                </button>

            </section>

        </form>

    </main>

    <div class="add-more-div">
        <div class="errors">
            
        </div>
        <button id="add-more-button">
            +
        </button>
        <button id="save-button">
            Salvar Treino
        </button>
        <a href="/workout-wise/home">Voltar</a>
    </div>
    
</body>
</html>