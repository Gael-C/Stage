<?php
	session_start();
    use function back\db\connect;
	require_once 'components/header.php';
	require_once 'components/navBar.php';

	if (!isset($_SESSION["login"])) {
	header('Location: index.php');
    }else if ($_SESSION['role'] === "USER") {
		header('Location: home.php');
	}

	require_once '../back/db/close.php';
?>
<body>
        <div id="form" class="container-fluid">
            <div class="row pt-5">
                <form method="post" action="../back/functions/traitement.php" class="col-md-6 mt-5">
                    <h1>Renseignez les champs</h1>

                    <div class="form-group">
                        <label for="login">Login : </label>
                        <input class="form-control" type="text" name="login" id="login">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input  class="form-control" type="password" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirmer votre mot de passe : </label>
                        <input  class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="role" id="role" class="form-check-">
                        <label for="role">Admin</label>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Créer mon compte" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
<?php require_once 'components/footer.php'; ?>
