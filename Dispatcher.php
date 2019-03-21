<?php
class Dispatcher{

	private $request;
	private $router;
	public function __construct(Router $router){
		$this->router=$router;
	}
	public function dispatch(){
		$this->request=new Request;
		if($this->router->match($this->request->get)){
			$controller = $this->router->params['controller'] . "Controller";
			include_once ROOT . "Controllers/".$controller.".php";
			if(class_exists($controller)){
				echo "<br/>";
				print_r($this->router->params);
				$controller_obj = new $controller($this->router->params);
				$action = $this->router->params['action'];
				if(method_exists($controller_obj,$action))
					$controller_obj->$action();
				else throw new \Exception("method doesnt exist");
			}
			else throw new \Exception("controller doesnt exist");
			

		}
		else throw new \Exception("nothing matched");


		//$controller=$this->loadController();
	//$controller = call_user_func_array(function, param_arr)
		var_dump($this->request); //debug
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		var_dump($this->router->params); //debug
	}
	public function loadController(){
		$name = $this->request->controller."Controller";
		$file = ROOT . 'Controllers/' . $name . ".php";
		require $file;

	}
}