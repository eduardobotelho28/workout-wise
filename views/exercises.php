<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout-Wise - Gerenciar Exercícios</title>
    <link rel="stylesheet" href="/workout-wise/assets/css/reset.css">
    <link rel="stylesheet" href="/workout-wise/assets/css/exercises.css">
    <script type="module" defer src="/workout-wise/assets/js/exercises.js"></script>
</head>
<body>
    <header>
        <h1>Gerenciar Exercícios</h1>
    </header>

    <a href="/workout-wise/home">Voltar</a>
    
    <main>

        <section class="form-section">
            <h2>Adicionar Exercício</h2>
            <form action="" method="POST" id="exercise-form">
                <label for="nome-exercicio">Nome do Exercício:</label>
                <input type="text" id="exercise_field" name="name" placeholder="Digite o nome do exercício" required>
                <button type="submit">Adicionar</button>
            </form>
        </section>

        <section class="table-section">
            <h2>Lista de Exercícios</h2>

            <?php if(!empty($exercises)) : ?>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Exercício</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($exercises as $exercise) : ?>
                         
                        <tr>
                            <td> <?= $exercise['id'] ?></td>
                            <td> <?= $exercise['name'] ?></td>
                            <td><button class="delete" id="<?= $exercise['id']?>">Excluir</button></td>
                        </tr>
                        
                        <?php endforeach ?>

                    </tbody>
                </table>

            <?php else : ?>

                <h2 style="color:black;">Ainda não há exercícios cadastrados</h2>

            <?php endif ?>
        </section>

    </main>
    <footer>
        <p>Workout-Wise &copy; 2025 - Todos os direitos reservados.</p>
    </footer>
</body>
</html>