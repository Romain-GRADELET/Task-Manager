const app = {
    init: function()
    {
        console.log("init");

        // On déclenche l'init des autres modules
        taskList.init();
    }
    
}

// Une fois que le DOM est chargé, on initialise notre module app
document.addEventListener("DOMContentLoaded", app.init);