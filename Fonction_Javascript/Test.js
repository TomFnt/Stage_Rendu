function modif(id)
{
    document.getElementById("blocModif").hidden = false;

    var eltId = document.getElementById("ligne_Id"+id);//récupère l'id de la ligne
    var eltRef = document.getElementById("ligne_Ref"+id); //récupère la réf de la ligne correspondant à id
    var eltCodeBarre = document.getElementById("ligne_CodeBarre" + id); //récupère le code barre de la ligne correspondant à id

    // affiche dans input du bloc modifier les valeurs de base de la référence qu'on souhaite modifier.
    var eltModif_id= document.getElementById("modif_Id").setAttribute('value', eltId.textContent);
    var eltModif_Ref= document.getElementById("modif_Ref").setAttribute('value', eltRef.textContent);
    var eltModif_CodeBarre= document.getElementById("modif_CodeBarre").setAttribute('value',eltCodeBarre.textContent);

}

function confirmModif(){
    if (confirm("Êtes-vous sûr de vouloir ajouter cette référence ?")) {

        var form_data = $("#formModif").serialize(); //Encode les éléments du formulaire pour la méthode "POST" ajax
        $.ajax({
            url: "Requete/Ajouter_Ref.php",
            type: "POST",
            data: form_data,
           success:function(response)
            {
                if(response.resultat = "Ajout réalisé")
                {
                    alert("l'ajout a été effectué. Rafraîchissez la page pour voir le changement")
                }
                else
                {
                    alert("l'ajout n'a pas été effecuté suite à une erreur")
                }
            }
        });
    }
    else {}
}


