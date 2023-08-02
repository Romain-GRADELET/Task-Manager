const app = {
    init: function()
    {
        // On déclenche l'init des autres modules
        taskList.init();
        taskAdd.init();
        categoryList.init();
    }
}
// Une fois que le DOM est chargé, on initialise notre module app
document.addEventListener("DOMContentLoaded", app.init);