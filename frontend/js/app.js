
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

    // On récupère l'Ul dans lequel l'ensemble des taches seront intégrées
    const taskList = document.querySelector('.tasklist')

    // Création du <li> 
    const liElement = document.createElement("li");

    // Création de la balise <p>
    const pElement = document.createElement("p");




}







document.addEventListener("DOMContentLoaded", getTasks);