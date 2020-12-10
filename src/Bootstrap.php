<?php

declare(strict_types=1);

namespace App;

use App\Actions\LoginAction;
use App\Actions\LogoutAction;
use App\Actions\IndexAction;
use App\Actions\PostLoginFormAction;
use App\SessionManager;
use Dotenv\Dotenv;

class Bootstrap
{
     private array $params;
     private string $action;

     public function __construct(array $params)
     {
          $this->loadDotEnvFile();
          $this->params = $params;
          $this->action = $params['action'] ?? '';
     }

     public function run() 
     {
          $this->initBasicRouter($this->action);
     }

     private function initBasicRouter(string $action)
     {
          switch (strtolower($action)) {
               case 'login':
                    $actionHandler = new LoginAction();
                    break;

               case 'post-login-form':
                    $actionHandler = new PostLoginFormAction();
                    break;

               case 'logout':
                    $actionHandler = new LogoutAction();
                    break;

               default:
                    $actionHandler = new IndexAction();                   
                    break;
          }

          $actionHandler();
     }

     private function loadDotEnvFile()
     {
          $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
          $dotenv->load();
     }
}