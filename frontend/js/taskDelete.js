const taskDelete = {
    init: async function(){
        console.log("taskDelete appelé");
    },


    deleteTaskInDOM: async function(){
        // On récupère l'ensemble des élément <li> du DOM
        const deleteElement = document.querySelectorAll('li');
        //console.log (deleteElement);

        // On récupère lélément qui est à l'origine de lévènement
        const currentElement = event.currentTarget;
        console.log (currentElement);

        // On récupère son parent <li>
        const liELement = currentElement.parentElement;
        console.log (liELement);

        // Suppression du DOM de l'élément
        liELement.remove();
    },



}