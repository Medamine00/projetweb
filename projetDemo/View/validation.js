function validernom() {
    var nomFormation = document.forms["formationForm"]["nom_formation"].value;

    var regex = /^[a-zA-Z\s]+$/;
    if (!regex.test(nomFormation)) {
        alert("Le nom de la formation doit contenir uniquement des lettres.");
        return false;
    }
    
    return true;
}

function validerdescription() {
    var descriptionFormation = document.forms["formationForm"]["description_formation"].value;
    if (descriptionFormation.length < 50) {
        alert("La description doit contenir au moins 50 caractères.");
        return false;
    }
    
    return true; 
}
