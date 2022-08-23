<?php
    session_start();
    require_once 'components/header.php';
?>
    <head>
        <link rel="stylesheet" href="style/indexStyle.css">
    </head>

<body class="text-center">

<main class="form-signin">
    <form action="../back/functions/login.php/login()" method="post">
        <h1 class="h3 mb-3 fw-normal">Connexion</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="login" name="login" placeholder="name@example.com">
            <label for="login">Login :</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password"name="password" placeholder="Password">
            <label for="password">Password :</label>
        </div>

        <button class="w-100 btn btn-lg " type="submit" name="connect" id="connect">Connexion</button>
        <p class="mt-5 mb-3 text-muted">© 2022</p>
    </form>
</main>


<?php require_once 'components/footer.php'; ?>