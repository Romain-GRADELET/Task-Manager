
/**
 * Chargement de la liste des taches depuis l'API
 */
async function getTasks(){
    console.log("Chargement de la liste des taches")

    let response = await fetch ('http://localhost:8000/api/tasks');

    console.log(response);

    let jsonData = await response.json();

    console.log(jsonData);

    for (const task of jsonData){
        displayTasks(task)
    }

}

/**
 * 
 * @param {Object} task from getTasks() 
 */
async function displayTasks(task){

    // Création du <li> 
    const liElement = document.createElement("li");
    // On attribut une class data-id à l'élément li
    //liElement.classList.add('data-id')

    // Création de la balise <p>
    const pElement = document.createElement("p");
    // On rempli la balise <p>
    pElement.textContent = task.title;

    // Création de la balise <div> pour Delete
    const deleteElement = document.createElement("div");
    // Ajout de la class delete
    deleteElement.classList.add('delete');

    // Création de la balise <div> pour Edit
    const editElement = document.createElement("div");
    // Ajout de la class edit
    editElement.classList.add('edit');

    // Composition du <li>
    liElement.prepend(pElement);
    liElement.append(deleteElement);
    liElement.append(editElement);

    // Insertion du <li> dans le <ul>
    const taskList = document.querySelector('.tasklist')
    taskList.append(liElement);

}


async function deleteTasks(){
    
}




document.addEventListener("DOMContentLoaded", getTasks);