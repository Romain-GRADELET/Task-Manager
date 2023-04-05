const taskAdd = {
    init: async function (){
        // Sélection du bouton d'ajout d'une tache
        const addButton = document.querySelector('.create-task-container button');
        // Ajout d'un écouteru d'évenement sur le bouton
        addButton.addEventListener('click', taskAdd.handleShowForm)
    },

    handleShowForm: function(){
        //console.log ('test click add');
        const addForm = document.querySelector('.modal-dialog');
        addForm.classList.add('show');

        const validateFormButton = document.querySelector(".modal-dialog button");
        validateFormButton.addEventListener ('click', taskAdd.insertTaskIntoAPI);
    },

    insertTaskIntoAPI: async function(event){
        event.preventDefault();

        let newTaskTitle = document.querySelector('#task-title');
        let inputTitle = newTaskTitle.value;
    
        let response = await fetch ('http://localhost:8000/api/tasks',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                title: inputTitle,
            })
        });

        //console.log (response.status); // retourne 201 si insertion en API

        if (response.status == 201){
            const addForm = document.querySelector('.modal-dialog');
            addForm.classList.remove('show');

            const dangerMessage = document.querySelector('.success');
            dangerMessage.removeAttribute('hidden');

            taskList.getAllTasksFromAPI();

        } else {
            const addForm = document.querySelector('.modal-dialog');
            addForm.classList.remove('show');

            const dangerMessage = document.querySelector('.danger');
            dangerMessage.removeAttribute('hidden');


        }

    }

}