<?php
include 'class.php';
/**
 * 
 */

class ClassB extends ClassA
{
	protected $test;

	public function __construct(){

		parent::__construct();

		$this->test = $this->varclass;
    }

	public function owner()
	{
		$a = $this->test;
		return $a;
	}

	public function tampil()
	{
		echo $this->varclass;
	}
}


 ?>