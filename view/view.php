<?php
class View{
	private $model;
	function __construct(Model $model){
		$this->model=$model;
	}
	function render(){
		echo $this->model->h1;
		echo $this->model->p;
	}
}