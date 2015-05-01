<?php
/* database constants */
define("DB_HOST", "mysql.lucalongo.eu" ); 		// set database host
define("DB_USER", "enterpriseAppDev" ); 			// set database user
define("DB_PASS", "luca20142015" ); 				// set database password
define("DB_PORT", 3306);				// set database port
define("DB_NAME", "enterpriseAppDev" ); 			// set database name
define("DB_CHARSET", "utf8" ); 			// set database charset
define("DB_DEBUGMODE", true ); 			// set database charset


/* actions for the STUDENTS REST resource */
define("ACTION_GET_STUDENTS", 33);
define("ACTION_SEARCH_NATIONALITY", 44);
define("ACTION_GET_TASKS", 55);
define("ACTION_GET_QUESTIONNAIRES", 56);
define("ACTION_GET_QUESTIONNAIRE", 57);
define("USERNAME", 'user');
define("PASSWORD", 'password');



/* HTTP status codes 2xx*/
define("HTTPSTATUS_OK", 200);
define("HTTPSTATUS_CREATED", 201);
define("HTTPSTATUS_NOCONTENT", 204);

/* HTTP status codes 3xx (with slim the output is not produced i.e. echo statements are not processed) */
define("HTTPSTATUS_NOTMODIFIED", 304);


/* HTTP status codes 4xx */
define("HTTPSTATUS_BADREQUEST", 400);
define("HTTPSTATUS_UNAUTHORIZED", 401);
define("HTTPSTATUS_FORBIDDEN", 403);
define("HTTPSTATUS_NOTFOUND", 404);
define("HTTPSTATUS_REQUESTTIMEOUT", 408);
define("HTTPSTATUS_TOKENREQUIRED", 499);

/* HTTP status codes 5xx */
define("HTTPSTATUS_INTSERVERERR", 500);

define("TIMEOUT_PERIOD", 120);

/* general message */
define("GENERAL_MESSAGE_LABEL", "message");
define("GENERAL_SUCCESS_MESSAGE", "success");
define("GENERAL_ERROR_MESSAGE", "error");
define("GENERAL_NOCONTENT_MESSAGE", "no-content");
define("GENERAL_NOTMODIFIED_MESSAGE", "not modified");
define("GENERAL_INTERNALAPPERROR_MESSAGE", "internal app error");
define("GENERAL_CLIENT_ERROR", "client error: modify the request");
define("GENERAL_INVALIDTOKEN_ERROR", "Invalid token");
define("GENERAL_APINOTEXISTING_ERROR", "Api is not existing");
define("GENERAL_RESOURCE_CREATED", "Resource has been created");
define("GENERAL_RESOURCE_UPDATED", "Resource has been updated");
define("GENERAL_RESOURCE_DELETED", "Resource has been deleted");

define("GENERAL_FORBIDDEN", "Request is ok but action is forbidden");
define("GENERAL_INVALIDBODY", "Request is ok but transmitted body is invalid");

define("GENERAL_WELCOME_MESSAGE", "Welcome to MSc dissertation API");

/* representation of a new user in the DB */
define("TABLE_USER_NAME_LENGTH", 25);
define("TABLE_USER_SURNAME_LENGTH", 25);
define("TABLE_USER_EMAIL_LENGTH", 50);
define("TABLE_USER_PASSWORD_LENGTH", 40);

?>