
<div class="modal-header">
    <h5 class="modal-title" id="ModalCnxLabel" style="color:white">
        Ajout de connexion</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="POST" action='../../back/functions/ajout/ajouter_cnx.php'>
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

            <input type="hidden" name="idClient" value="<?= $idClient ?>">

        </fieldset>
        <div class="form-group ">
            <input id="submit" type="submit" value="Valider" id="ajoutCnx"
                   class="btn">
        </div>
    </form>
</div>