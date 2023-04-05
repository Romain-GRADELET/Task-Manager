const taskDelete = {
 
    handleDeleteTaskInDOM: async function(event){

        // On récupère lélément qui est à l'origine de lévènement
        const currentElement = event.currentTarget;
        //console.log (currentElement);

        // On récupère son parent <li>
        // Ici parentElement foinctionne car il cherche le premier parent
        //const taskELement = currentElement.parentElement;

        // On récupère la <li> parente
        // DOC : https://developer.mozilla.org/fr/docs/Web/API/Element/closest
        let taskELement = currentElement.closest( 'li' ); 
        console.log (taskELement);

        //récupération de l'id de la tache pour le delete
        let taskID = taskELement.dataset.id;

        // On supprime la tache dans l'API
        await taskDelete.deleteTaskFromAPI(taskID);

        // Suppression du DOM de l'élément
        taskELement.remove();
    },

    deleteTaskFromAPI: async function (id){

        let response = await fetch ('http://localhost:8000/api/tasks/'+ id, {method: 'DELETE'});
        console.log (response);
    }

}