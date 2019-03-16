<?php  

class RecipeCollection{

	private $title;
	private $recipes = array();


	public function __construct($title = null){

		$this->setTitle($title);
	}

	 public function setTitle($title){
        if(empty($title)){

            $this->title = null;
        }else{
            $this->title = ucwords($title);
        }
        
    }
    
    public function getTitle(){
        return $this->title;
    }

     public function addRecipe($recipe)
    {
      $this->recipes[] = $recipe;
    }
    
    public function getRecipes()
    {
        return $this->recipes;
    }
    
    public function getRecipeTitles()
    {
        $titles = array();
        foreach ($this->recipes as $recipe) {
            $titles[] = $recipe->getTitle();
        }
        return $titles;
    }

    public function filterByTag($tag){

    	//var_dump($tag); exit();

    	$taggedRecipes = array();

    	foreach ($this->recipes as $recipe) {
    		
    		if(in_array(strtolower($tag), $recipe->getTags())){

    			$taggedRecipes[] = $recipe; 
    		}
    	}


    	return $taggedRecipes;

    	
    }
    public function getCombinedIngredients(){

        $ingredients = array();
        foreach ($this->recipes as $recipe) {
            foreach ($recipe->getIngredients() as $ing) {
                $item = $ing["item"];
                if(strpos($item, ",")){
                    $item = strstr($item, ",", true);   //strstr — Encuentra la primera aparición de un string
                } //strpos — Encuentra la posición de la primera ocurrencia de un substring en un string
                if(substr($item, -1) == "s" && array_key_exists(rtrim($item, "s"), $ingredients)){

                    $item = rtrim($item, "s");
                    //substr — Devuelve parte de una cadena menos el ultimo valor y array_key_exists — Verifica si el índice o clave dada existe en el array
                //rtrim — Retira los espacios en blanco (u otros caracteres) del final de un string
                }else if(array_key_exists($item . "s", $ingredients)){

                    $item .= "s";
                }


                $ingredients[$item] = array($ing["amount"],$ing["measure"]);
            }
            # code...
        }

        return $ingredients;

    }
}

























