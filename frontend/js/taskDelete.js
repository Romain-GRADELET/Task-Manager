const taskDelete = {
    init: async function(){
        console.log("taskDelete appelé");
    },


    deleteTaskInDOM: async function(event){

        // On récupère lélément qui est à l'origine de lévènement
        const currentElement = event.currentTarget;
        console.log (currentElement);

        // On récupère son parent <li>
        const taskELement = currentElement.parentElement;
        console.log (taskELement);

        // Suppression du DOM de l'élément
        taskELement.remove();
    },



}