<?php

class Render
{

	public function __toString()
	{

		//$output = "You are a calling a " . __CLASS__ . " object with the title \"";
		//$output .= $this->getTitle() . "\"";
		//$output .= "\nIt is stored in " . basename(__FILE__) . " at" . __DIR__ . ".";
		//$output .= "\nThis display is from line " . __LINE__ . " in method " . __METHOD__ . ".";
		$output = "\nThe following methods are available for " . __CLASS__ . " objects: \n";
		$output .= implode("\n", get_class_methods(__CLASS__));
		return $output;
	}

	public static function listShopping($ingredient_list)
	{

		ksort($ingredient_list); // ksort Ordena un array por clave, manteniendo la correlación entre la clave y los datos.
		return implode("\n", array_keys($ingredient_list)); // array_keys Retorna un array con todas las claves de array.
	}

	public static function listRecipes($titles)
	{

		asort($titles); //Ordena un array y mantiene la asociación de índices
		$output = "";
		foreach ($titles as $key => $title) {
			if ($output != "") {
				$output .= "\n";
			}
			$output .= "[key] $title";
		}

		return implode("\n", $titles);
	}

	public static function listIngredients($ingredients)
	{

		$output = "";
		foreach ($ingredients as $ing) {
			$output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
			$output .= "\n";
		}
		return $output;
	}

	public static  function displayRecipe($recipe)
	{

		$output = "";
		$output .= $recipe->getTitle() . "by " . $recipe->getSource();
		$output .= "\n";
		$output .= implode(", ", $recipe->getTags());
		$output .= "\n\n";
		$output .= self::listIngredients($recipe->getIngredients());
		$output .= "\n";
		$output .= implode("\n", $recipe->getInstructions());
		$output .= "\n";
		$output .= $recipe->getYield();
		return $output;
	}
}
