function verif_email(email,update=0){
    //utiliser ajax pour verifier cet email avec le back PHP
   var id_inscrit=$('#id_inscrit_up').val();
    $.ajax({
        type : "post",
        url: "api/verif_email.php",
        data : {email:email,update:update,id_inscrit:id_inscrit},
        success: function(result){
           if(result){
            var res=JSON.parse(result);
            console.log(res);

        if(res.email!=""){
        document.getElementById('email').classList.add("border-danger");
        document.getElementById('error_email').innerHTML="cet email existe deja!";
        document.getElementById('submit').setAttribute("disabled","disabled");
        }
    }else{
        document.getElementById('email').classList.remove("border-danger");
        document.getElementById('error_email').innerHTML="";
        document.getElementById('submit').removeAttribute("disabled");
    }

    }
});

} //fin function


function recup_id_inscrit(id_inscrit){
    document.getElementById('id_inscrit').value=id_inscrit;
  }

  setTimeout(function(){ $(".alert").hide(); }, 5000);

  function update(IdClient,Nom,Prenom,CodePostal,Localite,Telephone,Email,photo_cin){
    $("#nom").val(Nom);
    $("#prenom").val(Prenom);
    $("#email").val(Email);
    $("#num_tel").val(Telephone);
    $("#id_inscrit_up").val(id_inscrit);
    $("#nom").val(nom);
    $("#prenom").val(prenom);
    $("#email").val(email);
    $("#num_tel").val(num_tel);
    $("#id_inscrit_up").val(id_inscrit);
  }