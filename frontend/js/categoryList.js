const categoryList = {

        init: async function()
        {
            // On demande à l'API de nous retourner toutes les catégories
            let allCategories = await categoryList.getAllCategoriesFromAPI();
    
            // Maintenant que nos catégories sont récupérées (on est sur que c'est le cas grace a await)
            // On peut boucler dessus pour les ajouter au DOM
            for( let category of allCategories )
            {
            categoryList.insertCategoryInDOM( category );
            }
        },
    
        // Méthode qui renvoi la liste des catégories depuis l'API
        getAllCategoriesFromAPI: async function()
        {
            // On fait une requête à l'API grace à fetch
            let response = await fetch ('http://localhost:8000/api/categories');
            // Ici comme on a await fetch(), on ne reçoit pas une Promise mais la réponse de l'API
            //console.log(response);S
    
            // Il faut encore lire le JSON de cet réponse, et pour cela, on utilise .json() dessus
            // Attention là encore on reçoit Une promise (de lecture du JSON), il faut aussi await
            let jsonData = await response.json();
            //console.log (jsonData);
    
            // Ici j'ai besoin dans jsonData, le contenu de la réponse converti, je le retourne
            return jsonData;
    
        },
    
        // Méthode qui se charge d'ajouter les données d'UNE tache reçue en argument
        // dans le DOM en créant la structure du HTML qui la représente
        insertCategoryInDOM: function( categoryData )
        {
            const selectElement= document.querySelector('#select-category')

            //console.log (categoryData);
            // Création d'une balise <option> 
            const optionElement = document.createElement("option");
            // On rempli la balise <option>
            optionElement.textContent = categoryData.name;
            // On attribut la value de <option>
            optionElement.setAttribute("value", categoryData.id);
            
            selectElement.append (optionElement);
            
      }
    
}
