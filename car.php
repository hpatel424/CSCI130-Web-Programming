<?php
function generateRandomString($length = 10) {
	// list of characters that can be present in the string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

class Car implements JsonSerializable {
    public $id;
	public $brand;
    public $model;
    public $year;
    public $color;
    public $bodystyle;
    public $transmission;
    public $drivetype;
	
	public function __construct() { // the constructor has an input
	$this->id=0;
	$this->brand=generateRandomString();
    $this->model=generateRandomString();
    $this->year=2000;
    $this->color=generateRandomString();
    $this->bodystyle=generateRandomString();
    $this->transmission=generateRandomString();
    $this->drivetype=generateRandomString();
   }
	
	// Object to String
	public function jsonSerialize() {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
			'model' => $this->model,
            'year' => $this->year,
			'color' => $this->color,
 			'bodystyle' => $this->bodystyle,
			'transmission' => $this->transmission,
            'drivetype' => $this->drivetype
            ];
    }
	
    /*
	// Std Object -> Student Object
	public function Set($json)
	{
		$s1=$json['first_name'];
		$s2=$json['last_name'];
		$s3=$json['dob'];
		$s4=$json['address'];
		$s5=$json['id'];
		$s6=$json['current_units'];
		$s7=$json['current_gpa'];
		
		//echo $s1 .'   '. $s2;
		$this->SetFirstName($s1);
		$this->SetLastName($s2);
		$this->SetDOB($s3);
		$this->address=$s4;
		$this->SetID($s5);
		$this->current_units=$s6;
		$this->SetGPA($s7);
	}
    */


	
	public function Display() {
		$v=json_encode($this);
		echo $v;
	}
	
	public function GetString() {
		return json_encode($this);
	}
	
}


?>