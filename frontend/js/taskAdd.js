const taskAdd = {

    // Ici on a besoin d'une méthode init pour ajouter les eventListener
    // notamment sur le bouton qui affiche la modal et sur le form
    init: function()
    {
      // Ecoute du clic sur le bouton d'ajout (qui affiche la modal)
      let showModalButtonElement = document.querySelector( ".create-task-container > button" );
      showModalButtonElement.addEventListener( "click", taskAdd.handleShowModal );
  
      // Ecoute du clic sur le bouton de fermeture de la modal
      let closeModalButtonElement = document.querySelector( ".modal-dialog-close-button" );
      closeModalButtonElement.addEventListener( "click", taskAdd.handleClickCloseModal );
  
      // Ecoute du submit du formulaire d'ajout
      let addTaskFormElement = document.querySelector( ".modal-dialog > form" );
      addTaskFormElement.addEventListener( "submit", taskAdd.handleAddTaskFormSubmit );
  
    },
  
    // Méthode qui affiche la modal
    handleShowModal: function( event )
    {
      let modalElement = document.querySelector( ".modal-dialog" );
      modalElement.classList.add( "show" );
    },
  
    // Méthode qui masque la modal
    handleClickCloseModal: function( event )
    {
      let modalElement = document.querySelector( ".modal-dialog" );
      modalElement.classList.remove( "show" );
    },
  
    // Méthode qui gère la soumission du formulaire
    handleAddTaskFormSubmit: async function( event )
    {
      
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
  
    // Méthode qui indique à l'API qu'il faut créer la nouvelle task
    addTaskToAPI: async function(taskName)
    {
      //debugger;
      // let response = await fetch( "http://localhost:8000/api/tasks", {
      //   method  : "POST",
      //   headers : { "Content-Type": "application/json" },
      //   body    : JSON.stringify( { title: taskName } )
      // } );
  
      // Si on avait transmis formData en paramètre de la méthode
      // on aurait pu stringifier directement tout l'objet formData
        let response = await fetch( "http://localhost:8000/api/tasks", {
          method  : "POST",
          headers : { "Content-Type": "application/json" },
          body    : JSON.stringify(taskName)

        });
  
        if (response.status === 201) {

          const success = document.querySelector('.success');
          success.removeAttribute('hidden');
          setTimeout(() => {
              success.setAttribute("hidden", true); // Remettre l'attribut hidden après 3 secondes
          }, 3000);

          taskAdd.handleClickCloseModal();

      } else {
          const danger = document.querySelector('.danger');
          danger.removeAttribute('hidden');
      }
    },  

  };