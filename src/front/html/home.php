<?php
	session_start();

    use function back\db\Connect;
	require_once '../components/header.php';
	require_once '../../back/functions/autodisconnect.php';


		$sql = connect()->prepare("SELECT client_nom,client_id, ent_nom
        FROM CR_Clients 
        ORDER BY client_nom ASC 
        ");
		$sql->execute();
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);

	require_once '../../back/db/close.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5" style="color: #cb4278">
    <div class="container-fluid">
        <a href="home.php" id="btn" class="btn">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 10px">
            <ul class="navbar-nav mr-auto">
				<?php if ($_SESSION['role'] === "ADMIN") : ?>
                    <li class="nav-item">
                        <a id="btn" class="btn" style="margin-left: 10px" href="ajout.php">Ajouter</a>
                    </li>
				<?php endif;?>
            </ul>
        </div>
        <a id="btn" href="../../../back/functions/disconnect.php" style="margin-left: 10px;" class="btn">Déconnexion</a>
    </div>
</nav>
<body>
<main class="container">
    <div class="row">
        <form class="navbar-form" style="margin-bottom: 25px">
            <div class="form-group" style="display:inline;">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Recherche" id="search" name="search">
                    <button id="btn" type="button" class="btn" onclick="Chercher()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                        Recherche
                    </button>
                </div>
            </div>
        </form>

        <?php
			if (!empty($_SESSION['erreur'])) {
				echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['erreur'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>

                      </div>';
				$_SESSION['erreur'] = "";
			}
		?>
        <table class="table">
            <thead>
            <th style="text-align: center;">Nom</th>
            </thead>
            <tbody>
			<?php
				foreach ($result as $client) {
					?>
                    <tr>
                        <?php if (empty($client['client_nom'])){ ?>
                        <td id="name"><a href="details.php?idClient=<?= $client['client_id'] ?>"><button style="width: 100%;font-weight: bold" class="btn btn-light"><?= $client['ent_nom'] ?></button></a></td>
                        <?php }else{?>
                            <td id="name" ><a href="details.php?idClient=<?= $client['client_id'] ?>"><button style="width: 100%;font-weight: bold" class="btn btn-light"><?= $client['client_nom'] ?></button></a></td>
                        <?php }?>
                    </tr>
					<?php
				}
			?>
            </tbody>
        </table>
    </div>
</main>
<script type="text/javascript">
    //La recherche rends les autres lignes "vides"
    document.getElementById('search').addEventListener('keyup', function () {
        var recherche = this.value.toLowerCase();
        var details = document.querySelectorAll('#name');

        Array.prototype.forEach.call(details, function (document) {
            // On a bien trouvé les termes de recherche.
            if (document.innerHTML.toLowerCase().indexOf(recherche) > -1) {
                document.style.display = 'block';
            } else {
                document.style.display = 'none';
            }
        });
    });

    //Fonctionne comme une recherche windows, met en surbrillance les mots recherché.
    function Chercher() {
        var recherche = document.getElementById('search').value;
        window.find(recherche);
        return true;
    }
</script>
<?php require_once '../components/footer.php' ?>

