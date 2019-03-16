<?php  

class Recipe{
    private $title;
    public $ingredients = array();
    public $instructions = array();
    public $yield;
    public $tag = array();
    public $source = "Alena Holligan";
    
    private $measurements = array(
        "tsp",
        "tbsp",
        "cup",
        "oz",
        "lb",
        "fl oz",
        "pint",
        "quart",
        "gallon"
    );
    
    public function setTitle($title)
    {
        if(empty($title)){

            $this->title = null;
        }else{
            $this->title = ucwords($title);
        }
        
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function addIngredient($item, $amount = null, $measure = null)
    {
        if ($amount != null && !is_float($amount) && !is_int($amount)) {
            exit("The amount must be a float: " . gettype($amount) . " $amount given");
        }
        if ($measure != null && !in_array(strtolower($measure), $this->measurements)) {
            exit("Please enter a valid measurement: " . implode(", ", $this->measurements));
        }
        $this->ingredients[] = array(
            "item" => ucwords($item),
            "amount" => $amount,
            "measure" => strtolower($measure)
        );
    }
    
    public function getIngredients()
    {
        return $this->ingredients;
    }
    
    public function addInstruction($string)
    {
        $this->instructions[] = $string;
    }
    
    public function getInstructions()
    {
        return $this->instructions;
    }
    
    public function addTag($tag)
    {
        $this->tags[] = strtolower($tag);
    }
    
    public function getTags()
    {
        return $this->tags;
    }
    
    public function setYield($yield)
    {
        $this->yield = $yield;
    }
    
    public function getYield()
    {
        return $this->yield;
    }
    
    public function setSource($source)
    {
        $this->source = ucwords($source);
    }
    
    public function getSource()
    {
        return $this->source;
    }

    public function displayRecipe(){
	return $this->title . " by " . $this->source;
	}

	public function __construct($title = null){

		$this->setTitle($title);
	}

	public function __toString(){

		$output = "You are a calling a " . __CLASS__ . " object with the title \"";
		$output .= $this->getTitle() . "\"";
		$output .= "\nIt is stored in " . basename(__FILE__) . " at" . __DIR__ . ".";
		$output .= "\nThis display is from line " . __LINE__ . " in method " . __METHOD__ . ".";
		$output .= "\nThe following methods are available for the objects o this class: \n";
		$output .= implode("\n",get_class_methods(__CLASS__));
		return $output;
	}
}




/*$recipe1 = new MyRecipe();
$recipe1->source = "Eduardo Chan";
$recipe1->setTitle = "my first recipe";
$recipe1->addIngredients("egg", 1, "doz");


$recipe2 = new MyRecipe();
$recipe2->source = "Roberto Cruz";
$recipe2->setTitle = "My second recipe";

echo $recipe1->getTitle;
echo $recipe1->displayRecipe();
echo $recipe2->displayRecipe();*/



//var_dump($recipe1); 

