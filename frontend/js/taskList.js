const taskList = {
    init: async function()
    {
        console.log ("taskList appelé")

        // Optionnel : vider la <ul> si on ne l'a pas déjà fait dans le HTML
        // let taskListElement = document.querySelector( ".tasklist" );
        // taskListElement.textContent = "";

        // On demande à l'API de nous retourner toutes les taches
        let allTasks = await taskList.getAllTasksFromAPI();

        // Maintenant que nos taches sont récupérées (on est sur que c'est le cas grace a await)
        // On peut boucler dessus pour les ajouter au DOM
        for( let task of allTasks )
        {
        taskList.insertTaskInDOM( task );
        }
    
    },

    // Méthode qui renvoi la liste des taches depuis l'API
    getAllTasksFromAPI: async function()
    {
        console.log ("tasklist getAllTasksFromAPI");

        // On fait une requête à l'API grace à fetch
        let response = await fetch ('http://localhost:8000/api/tasks');
        // Ici comme on a await fetch(), on ne reçoit pas une Promise mais la réponse de l'API
        console.log(response);

        // Il faut encore lire le JSON de cet réponse, et pour cela, on utilise .json() dessus
        // Attention là encore on reçoit Une promise (de lecture du JSON), il faut aussi await
        let jsonData = await response.json();
        console.log (jsonData);

        // Ici j'ai besoin dans jsonData, le contenu de la réponse converti, je le retourne
        return jsonData;

    },

    // Méthode qui se charge d'ajouter les données d'UNE tache reçue en argument
    // dans le DOM en créant la structure du HTML qui la représente
    insertTaskInDOM: function( taskData )
    {
        // Création du <li> 
        const liElement = document.createElement("li");
        // On attribut une class data-id à l'élément li
        liElement.dataset.id = taskData.id;

        // Création de la balise <p>
        const pElement = document.createElement("p");
        // On rempli la balise <p>
        pElement.textContent = taskData.title;

        // Création de la balise <div> pour Delete
        const deleteElement = document.createElement("div");
        // Ajout de la class delete
        deleteElement.classList.add('delete');

        // Création de la balise <div> pour Edit
        const editElement = document.createElement("div");
        // Ajout de la class edit
        editElement.classList.add('edit');

        // Composition du <li>
        liElement.append(pElement);
        liElement.append(deleteElement);
        liElement.append(editElement);

        // Insertion du <li> dans le <ul>
        const taskList = document.querySelector('.tasklist')
        taskList.append(liElement);

  }

};