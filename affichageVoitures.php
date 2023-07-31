<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<?php include "menu.php";?>

<div class="container">
<?php 
$sql="select * from voiture";//changer
$voitures=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

?>
  <!-- Content here -->

  
<h1>Liste des Voitures</h1>

<?php 
if(!empty($_GET['message']))
echo "<div class='alert alert-".$_GET['type']."'>".$_GET['message']."</div>";


echo '
<table class="table table-striped table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">immatriculation </th>
      <th scope="col">marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Cylindree</th>
      <th scope="col">dateachat</th>
	<th scope="col">image voiture</th>
    </tr>
  </thead>
  <tbody>';
foreach($voitures as $voiture){
    echo "<tr>
      <td>".$voiture->immatriculation."</td>
      <td>".$voiture->marque."</td>
      <td>".$voiture->Modele."</td>
      <td>".$voiture->Cylindree."</td>
      <td>".$voiture->dateachat."</td>
	<td><img src='uploads/".$voiture->image_voiture."' style='height:100px, widht:100px'/></td>
      <td>
      <button type='button' onclick=\"update(".$voiture->immatriculation.",'".$voiture->marque."','".$voiture->Modele."','".$voiture->dateachat."')\" class='btn btn-success' data-bs-toggle='modal' data-bs-target='#update'>Modifier
  </button>
      
      <form class='d-inline' method='post' action='delete.php'>
      <input type='hidden' name='id_inscrit' value='".$voiture->immatriculation."'>
      <button type='submit' name='submit_delete' class='btn btn-danger' onclick=\"return confirm('etes vous sure de supprimer?')\" title='supprimer'><i class='bi bi-trash3-fill'></i></button></a>
      </form>

      </td>
    </tr>";
} 
  echo "</tbody>
</table>";
?>
<!-- Modal suppression -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation de suppression</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="suppression.php">
      <div class="modal-body">
        Etes vous sure de supprimer?
        <input type="hidden" name="id_inscrit" id="id_inscrit">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-success" name="supp">Oui</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- FIN Modal suppression -->


<!-- Modal modification inscrit -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier inscrit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="update.php" enctype="multipart/form-data">
      <div class="modal-body">

      <div class="row">
    <div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="nom">immatriculation</label>
    <input type="text"  class="form-control" name="immatriculation" id="nom" required>
    </div>

    <div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="prenom">marque</label>
    <input type="text" class="form-control" name="marque" id="prenom" required>
    </div>
</div>

<div class="row">
    <div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="email">Modele</label>
    <input type="email"class="form-control" name="Modele" id="email" required>
    <div id="error_email" class="text text-danger"></div>
</div>

    <div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="num_tel">Cylindree</label>
    <input type="number" class="form-control" name="Cylindree" id="num_tel" required>
    </div>
</div>
<div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="num_tel">dateachat</label>
    <input type="date" class="form-control" name="dateachat" id="num_tel" required>
    </div>
<div class="mb-3 col-sm-12 col-md-6">
    <label class="form-label" for="num_tel">image_voiture</label>
    <input type="file" name="image_voiture" accept="image/png, image/jpeg, image/gif">
    <br>
    </div>
</div>
      
        <input type="hidden" name="id_inscrit" id="id_inscrit_up">
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="submit" class="btn btn-success" name="upd">Modifier</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- FIN Modal modification inscrit -->
<script src="js/script1.js"></script>
</body>
</html>