<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Wise - Treinos</title>
    <link rel="stylesheet" href="/workout-wise/assets/css/reset.css">
    <link rel="stylesheet" href="/workout-wise/assets/css/my_workouts.css">
    <script type="module" defer src="/workout-wise/assets/js/workout.js"></script>
</head>
<body>
    
    <main>

        <h1>Meus Treinos</h1>

        <a href="/workout-wise/home">Voltar</a>
        
        <?php if (!empty($data_by_name)) : ?>

            <?php foreach ($data_by_name as $name => $arrays) : ?>
                
                <div class="workout">

                    <div class="workout-title">
                        <?= $name ?>
                    </div>

                    <?php foreach ($arrays as $array) : ?>

                        <div class="workout-info">
                            
                            <p>Exercício: <?= $array['exercise_name'] ?? '' ?></p>
                            <p>Séries : <?= $array['series'] ?? '' ?></p>
                            <p>Reps: <?= $array['reps'] ?? '' ?></p>
                            <p>Peso: <?= $array['weight'] ?? '' ?></p>
                            <p>Data: <?= $array['created_at'] ?? '' ?></p>

                            <a href="workout/delete_workout/<?=$array['id']?>">Deletar Treino</a>

                        </div>
                        
                    <?php endforeach ?>

                </div>

            <?php endforeach ?>

        <?php endif ?>

    </main>
    
</body>
</html>