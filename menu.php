<?php include "config.php" ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="affichageClients.php">Liste des clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="affichageVoitures.php">Liste des voitures</a>
        </li>
 	<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="affichageLocations.php">Liste des Locations</a>
        </li>
<li class="nav-item">
            <a href="deconnexion.php"><button class="btn btn-danger">Déconnexion</button></a>
          </li>
      </ul>
      
    </div>
  </div>
</nav>