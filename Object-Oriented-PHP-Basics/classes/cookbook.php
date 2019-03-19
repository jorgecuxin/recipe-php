<?php  
include "../classes/recipe.php";
include "../classes/render.php";
include "../classes/recipecollection.php";

include "../inc/recipes.php";


$cookbook = new RecipeCollection("Treehouse Recipes");
$cookbook->addRecipe($lemon_chicken);
$cookbook->addRecipe($granola_muffins);
$cookbook->addRecipe($belgian_waffles);
$cookbook->addRecipe($pepper_casserole);
$cookbook->addRecipe($lasagna);
$cookbook->addRecipe($dried_mushroom_ragout);
$cookbook->addRecipe($rabbit_catalan);
$cookbook->addRecipe($grilled_salmon_with_fennel);
$cookbook->addRecipe($pistachio_duck);
$cookbook->addRecipe($chili_pork);
$cookbook->addRecipe($crab_cakes);
$cookbook->addRecipe($beef_medallions);
$cookbook->addRecipe($silver_dollar_cakes);
$cookbook->addRecipe($french_toast);
$cookbook->addRecipe($corn_beef_hash);
$cookbook->addRecipe($granola);
$cookbook->addRecipe($spicy_omelette);
$cookbook->addRecipe($scones);



$breakfast = new RecipeCollection("Favorite breakfasts");

foreach ($cookbook->filterByTag("breakfast") as $recipe) {

	$breakfast->addRecipe($recipe);
}
 echo "<pre>";

 $week1 = new RecipeCollection("Meal Plan: week 1");
 $week1 ->addRecipe($cookbook->filterById(2));
 $week1 ->addRecipe($cookbook->filterById(3));
 $week1 ->addRecipe($cookbook->filterById(6));
 $week1 ->addRecipe($cookbook->filterById(16));
 
//echo Render::listRecipes($week1->getRecipeTitles());
//echo Render::listRecipes($cookbook->getRecipeTitles());
echo "\n\nShopping List\n\n";
echo Render::listShopping($week1->getCombinedIngredients()); 
/*
$recipe1 = new Recipe();
$recipe1->source = "Grandma Holligan";
$recipe1->setTitle("my first recipe");
$recipe1->addIngredient("egg", 1);
$recipe1->addIngredient("flour", 2, "cup");

$recipe2 = new Recipe();
$recipe2->source = "Betty Crocker";
$recipe2->setTitle("my second recipe");

//echo $recipe1->getTitle;

foreach ($recipe1->getIngredients() as $ing) {
	echo "\n".$ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
}

$recipe1->addInstruction("This is my first instruction");
$recipe1->addInstruction("This is my second instruction");
//echo implode("\n", $recipe1->getInstruction()); //Une elementos de un array en un string

$recipe1->addTag("Breakfast");
$recipe1->addTag("Main Course");

$recipe1->setYield("6 servings");
echo $recipe1;
echo new Render();
//echo $recipe1->getYield();
*/


//echo Render::displayRecipe($belgian_wafles);
//echo Render::displayRecipe($cookbook->filterById(2));