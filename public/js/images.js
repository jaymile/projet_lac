window.onload = () => {
    //gestion des lien supprimer
    // le querySelectorAll va chercher tout les balises qui comportent "data-delete"
    let links = document.querySelectorAll("[data-delete]")

    //on boucle sur links
    for (link of links) {
        //on ecoute le clic
        link.addEventListener("click", function(e){
            //on empeche la navigation
            e.preventDefault()

            //on demande une confimation
            if(confirm("etes-vous sur de vouloir supprimer cette images ?")){
                //on envoie une requette ajax vers le href du lien avec la methode DELETE
                fetch(this.getAttribute("href"),{//"this" est le lien sur laquel on a cliqué
                method: "DELETE",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({"_token": this.dataset.token})
            }) .then(
                // On récupère la réponse en JSON
                response => response.json()
            ).then(data => {
                if(data.success)
                    this.parentElement.remove()
                else
                    alert(data.error)
            }).catch(e => alert(e))
            }
        })
    }
}