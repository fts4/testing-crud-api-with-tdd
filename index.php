<?php

interface Logger {
   public function execute();
}

class FileLogger{
   public function execute($message) {
      echo "\nLog to file: $message \n";
   }
}

class DatabaseLogger {
   public function execute($message) {
     echo "\nLog to database: $message \n";
   }
}


class UserController {
   protected $logger; 
   public function __construct(FileLogger $logger) { // bad practice passing in a concrete class
      $this->logger = $logger;
   }

   public function show($message) {
     $logger = new FileLogger(); // bad practice, the show method doesn't need to know the concrete
 				// implementation of Logger. A logger interface is enough in the 
 				// constructor
     $logger->execute($message);

   }
}

$controller = new UserController(new FileLogger);
$controller->show("hello");
