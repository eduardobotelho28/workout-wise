<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Wise - Treinos</title>
    <link rel="stylesheet" href="/workout-wise/assets/css/reset.css">
    <link rel="stylesheet" href="/workout-wise/assets/css/workouts.css">
</head>
<body>
    
    <main>

        <h1 id="title">Cadastre Seus Treinos</h1>

        <div class="form-wrapper">
            <label for="name">Nome(tipo)</label>
            <input type="text" name="name" id="name">
        </div>

        <section id="treino">

            <form action="" id="form-workout">

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

            </form>

        </section>

    </main>

    <div class="add-more-div">
        <button>
            +
        </button>
    </div>
    

</body>
</html>