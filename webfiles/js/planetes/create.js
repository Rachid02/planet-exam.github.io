let submitBtn = document.querySelector('form button[type="submit"]');

let allInputs = document.querySelectorAll('form input');
let allSelects = document.querySelectorAll('form select');
let allTextareas = document.querySelectorAll('form textarea');

let main = document.querySelector("main");

submitBtn.addEventListener("click", e=>{
    e.preventDefault();

    // Effectuer un test d'intégrité sur l'ensemble des champs côté front end.
    // allInputs.addEventListener("input", function (event) {
        // Chaque fois que l'utilisateur saisit quelque chose
        // on vérifie la validité du champ.
        // if (email.validity.valid) {
          // S'il y a un message d'erreur affiché et que le champ
          // est valide, on retire l'erreur
        //   error.innerHTML = ""; // On réinitialise le contenu
        //   error.className = "error"; // On réinitialise l'état visuel du message
        // }
    //   }, false);

    requestParams = "";

    allInputs.forEach(singleInput => {
        let fieldName = singleInput.name;
        let fieldValue = singleInput.value;
        requestParams += fieldName+"="+fieldValue+"&"; 
    });

    allSelects.forEach(singleSelect => {
        let fieldName = singleSelect.name;
        let fieldValue = singleSelect.value;
        requestParams += fieldName+"="+fieldValue+"&"; 
    });

    allTextareas.forEach(singleTextarea => {
        let fieldName = singleTextarea.name;
        let fieldValue = singleTextarea.value;
        requestParams += fieldName+"="+fieldValue+"&"; 
    });

    requestParams = requestParams.substring(0, requestParams.length - 1);
    

    // Si il n'y a pas d'erreurs //
    fetch('../models/planetes/create.php?'+requestParams).then((resp) => resp.text().then(data=>{
        if(data === "inserted"){

            let success = document.createElement("div");
            success.setAttribute("id", "success");
            success.innerHTML = "<p>Planète ajoutée !</p>";
            
            if(!document.getElementById("success")){
                main.append(success);
            }

            // Vider les champs du formulaire et leur passer l'attribut disabled

        }
        else{
            // Afficher sur la page : Une erreur est survenue
            let error = document.createElement("div");
            error.setAttribute("id", "error");
            error.innerHTML = "<p>La planète n'a pas pu être ajoutée !</p>";

            if(!document.getElementById("error")){
                main.append(error);
            }

            console.log(data);
        }
    }))

});