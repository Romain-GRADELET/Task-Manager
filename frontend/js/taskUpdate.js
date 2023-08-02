const taskUpdate = {

    handleUpdateButtonClick: async function( event )
    {
        // console.log( event );

        taskAdd.handleShowModal();
      
        // On récupère l'élement cliqué
        const clickedButtonElement = event.currentTarget;
        
        // On récupère la <li> parente la plus proche
        // DOC : https://developer.mozilla.org/fr/docs/Web/API/Element/closest
        const taskElement = clickedButtonElement.closest( 'li' );
        // console.log( taskElement );
    
        // Récupération de l'id de la tache pour update
        const taskID = taskElement.dataset.id;
        const title = taskElement.querySelector("p").textContent;
        const categoryName = taskElement.querySelector("em").textContent;

        // Récupération de l'id
        const category = taskElement.querySelector("em");
        const categoryId = category.dataset.id;

        console.log(categoryName, categoryId);

        // On pré-remplit les champs du formulaire
        const currentTaskId = document.querySelector("#task-id");
        const currentTitle = document.querySelector("#task-title");
        const currentCategory = document.querySelector("#select-category");

        currentTaskId.value = taskID;
        currentTitle.value = title;
        currentCategory.value = categoryId;
    
        
        event.preventDefault();
        // console.log(event);
        // on récupère l'élément cliqué
        const newTask = event.currentTarget;
        // on récupère la value de l'input avec FormData
        const dataTask = new FormData(newTask);
        console.log(dataTask.get('title', 'category'));

        // on crée le nouvel objet à convertir en json
        const newTaskJson = {
            "title": dataTask.get('title'),
            "category_id": dataTask.get('category')
        };

        await taskAdd.addTaskToAPI(newTaskJson);

        // rechercgement de la page à défnir
        let taskListElement = document.querySelector( ".tasklist" );
        taskListElement.textContent = "";
        taskList.init();

    },


    updateTaskFromAPI: async function( id, taskModified )
    {
      let response = await fetch( 
        "http://localhost:8000/api/tasks/" + id,    // URL de l'endpoint d'API
        { 
        method: 'PUT' ,
        headers : { "Content-Type": "application/json" },
        body    : JSON.stringify(taskModified)
        }        
      );
      console.log( response );
    }
  }
 


