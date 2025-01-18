<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout-Wise - Home</title>
    <link rel="stylesheet" href="/workout-wise/assets/css/reset.css">
    <link rel="stylesheet" href="/workout-wise/assets/css/home.css">
</head>
<body>
    <header>
        <h1>Bem-vindo, <?= $name ?? 'usuario'?></h1>
    </header>
    <main>
        <section class="options">
            <div class="option">
                <a href="">Cadastrar Exercício</a>
            </div>
            <div class="option">
                <a href="">Cadastrar Treino</a>
            </div>
            <div class="option">
                <a href="">Meus Treinos</a>
            </div>
            <div class="option">
                <a href="authentication/logout">Sair</a>
            </div>
        </section>
        <section class="about">
            <h2>Sobre o Workout-Wise</h2>
            <p>O Workout-Wise ajuda você a organizar seus exercícios e treinos de forma simples e eficiente. Acesse suas rotinas, cadastre novos exercícios e acompanhe seu progresso!</p>
        </section>
    </main>
    <footer>
        <p>Workout-Wise &copy; 2025 - Todos os direitos reservados.</p>
    </footer>
</body>
</html>
