<?php
	session_start();

    use function back\db\connect;

    require_once '../components/header.php';
    require_once '../../back/functions/autodisconnect.php';


	if (!isset($_SESSION["login"])) {
		header('Location: ../index.php');
	} else if ($_SESSION['role'] === "USER") {
		header('Location: home.php');
	}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5" style="color: #cb4278">
    <div class="container-fluid">
        <a href="home.php" style="width: 1%"><img style="width: 35px" src="../../img/A2MIlogo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 30px">
            <ul class="navbar-nav mr-auto">
				<?php if ($_SESSION['role'] === "ADMIN") : ?>
                    <li class="nav-item">
                        <a id="btn" class="btn" style="margin-left: 10px" href="ajout.php">Ajouter</a>
                    </li>
				<?php endif;?>
            </ul>
        </div>
        <a id="btn" href="../../back/functions/disconnect.php" style="margin-left: 10px;" class="btn">Déconnexion</a>
    </div>
</nav>

<form enctype="multipart/form-data" method="post" action="../../back/functions/ajout/ajout.php" >
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Ajouter un client
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div id="form" class="col-md-6 mt-5">
                        <div>
                            <fieldset>
                                <legend>Informations du client</legend>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nom : </span>
                                    </div>
                                    <input class="form-control" type="text" name="nom" id="nom">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Adresse : </span>
                                    </div>
                                    <input class="form-control" type="text" name="adresse" id="adresse">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Téléphone : </span>
                                    </div>
                                    <input class="form-control" type="text" name="telephone" id="telephone">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mail : </span>
                                    </div>
                                    <input class="form-control" type="email" name="mail" id="mail">
                                </div>

                            </fieldset>
                            <fieldset style="margin-top: 20px">
                                <legend>Informations de l'Entreprise</legend>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nom de l'Entreprise : </span>
                                </div>
                                <input class="form-control" type="text" name="ent_nom" id="ent_nom">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Adresse : </span>
                                </div>
                                <input class="form-control" type="text" name="ent_adresse" id="ent_adresse">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Téléphone : </span>
                                </div>
                                <input class="form-control" type="text" name="ent_tel" id="ent_tel">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mail : </span>
                                </div>
                                <input class="form-control" type="email" name="ent_mail" id="ent_mail">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Siret : </span>
                                </div>
                                <input class="form-control" type="text" name="siret" id="siret">
                            </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Ajouter une connexion
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div id="form" class="col-md-6 mt-5">
                        <div class="row pt-5">
                            <fieldset>
                                <legend>Informations de la connexion</legend>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nom de la connexion : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_nom" id="cnx_nom">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Login : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_log" id="cnx_log">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mot de passe : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_mdp" id="cnx_mdp">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Clé de produit : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_cle" id="cnx_cle">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date de naissance produit : </span>
                                    </div>
                                    <input class="form-control" type="date" value="<?= date('Y-m-d') ?>"
                                           name="cnx_date_produit"
                                           id="cnx_date_produit">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Téléphone de secours Icloud  : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_tel_sec_icloud"
                                           id="cnx_tel_sec_icloud">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mail de secours Icloud : </span>
                                    </div>
                                    <input class="form-control" type="text" name="cnx_mail_sec_icloud"
                                           id="cnx_mail_sec_icloud">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date de naissance Icloud : </span>
                                    </div>
                                    <input class="form-control" type="date" value="<?= date('Y-m-d') ?>"
                                           name="cnx_date_sec_icloud"
                                           id="cnx_date_sec_icloud">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed btn-lg btn-block" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Ajouter un matériel
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div id="form" class="col-md-6 mt-5">
                        <div class="row pt-5">
                            <fieldset>
                                <legend>Informations du matériel</legend>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nom du matériel : </span>
                                    </div>
                                    <input class="form-control" type="text" name="mat_nom" id="mat_nom">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Modèle : </span>
                                    </div>
                                    <input class="form-control" type="text" name="modele" id="modele">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Infos : </span>
                                    </div>
                                    <input class="form-control" type="text" name="infos" id="infos">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IP : </span>
                                    </div>
                                    <input class="form-control" type="text" name="ip" id="ip">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IEMC : </span>
                                    </div>
                                    <input class="form-control" type="text" name="iemc" id="iemc">
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Ajouter une image
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div id="form" class="col-md-6 mt-5">
                        <fieldset>
                            <legend>Images</legend>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Titre</span>
                                </div>
                                <input class="form-control" type="text" id="title" name="title">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Photo</span>
                                </div>
                                <input type="file" id="photo" name="photo" class="form-control"
                                       aria-label="Photo">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group ">
        <input id="submit" type="submit" value="Valider" id="ajoutClient"
               class="btn">
    </div>
</form>

<?php require_once '../components/footer.php' ?>
