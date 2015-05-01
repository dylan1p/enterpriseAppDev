<?php
require_once "../Slim/Slim.php";
Slim\Slim::registerAutoloader ();

$app = new \Slim\Slim (); // slim run-time object

require_once "conf/config.inc.php";

function authenticate(\Slim\Route $route)   {
	$app = \Slim\Slim::getInstance();

 	$headers= $app->request->headers;
 	if($headers["username"] != USERNAME || $headers["password"] != PASSWORD)
 		$app->halt(401);
 	else
		return true;
}

//get students Average and deviation
$app->map ( "/statistics/students", "authenticate", function () use($app) {
	
	$httpMethod = $app->request->getMethod ();
	$action = null;
	
	switch ($httpMethod) {
		case "GET" :
			$action = ACTION_GET_STUDENTS;
			break;
		default :
	}
	
	return new loadRunMVCComponents ( "StudentModel", "StudentController", "jsonView", $action, $app);
} )->via ( "GET");

//get students by nationality
$app->map ( "/statistics/students/:nationality", function ($string = null) use($app) {
	
	$parameters["SearchingString"] = $string;
	$action = ACTION_SEARCH_NATIONALITY;
	return new loadRunMVCComponents ( "StudentModel", "StudentController", "jsonView", 
			$action, $app, $parameters );
} )->via ( "GET" );

//get number of tasks, avg and deviation
$app->map ( "/statistics/tasks", function ($string = null) use($app) {
	
	$httpMethod = $app->request->getMethod ();
	$action = null;
	
	switch ($httpMethod) {
		case "GET" :
			$action = ACTION_GET_TASKS;
			break;
		default :
	}
	
	return new loadRunMVCComponents ( "TaskModel", "TaskController", "jsonView", $action, $app);
} )->via ( "GET" );


//get number of tasks, avg and deviation
$app->map ( "/statistics/questionnaires(/:id)", function ($taskID = null) use($app) {
	$parameters ["id"] = $taskID; 

	$httpMethod = $app->request->getMethod ();
	$action = null;

	switch ($httpMethod) {
		case "GET" :
			if ($taskID != null)
				$action = ACTION_GET_QUESTIONNAIRE;
			else
				$action = ACTION_GET_QUESTIONNAIRES;
			break;
		default :
	}
	
	return new loadRunMVCComponents ( "QuestionnaireModel", "QuestionnaireController", "jsonView", $action, $app, $parameters);
} )->via ( "GET" );





$app->run ();
class loadRunMVCComponents {
	public $model, $controller, $view;
	public function __construct($modelName, $controllerName, $viewName, $action, $app, $parameters = null) {
		include_once "models/" . $modelName . ".php";
		include_once "controllers/" . $controllerName . ".php";
		include_once "views/" . $viewName . ".php";
		
		$this->model = new $modelName (); // common model
		$this->controller = new $controllerName ( $this->model, $action, $app, $parameters );
		$this->view = new $viewName ( $this->controller, $this->model, $app ); // common view
		$this->view->output (); // this returns the response to the requesting client
	}
}

?>