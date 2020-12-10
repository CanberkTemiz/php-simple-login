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
          session_start();
          $this->loadDotEnvFile();
          $this->params = $params;
          $this->action = $params['action'] ?? 'index';
          $this->middlewares = [
              'index' => AuthMiddleware::class,
              'logout' => AuthMiddleware::class,
              'post-login-form' => GuestMiddleware::class,
              'login' => GuestMiddleware::class,
          ];
     }

     public function run() 
     {
          $this->initBasicRouter($this->action);
     }

     private function initBasicRouter(string $action)
     {
          $action = strtolower($action);
          switch ($action) {
               case 'login':
                    $actionHandler = new LoginAction();
                    break;

               case 'post-login-form':
                    $actionHandler = new PostLoginFormAction();
                    break;

               case 'logout':
                    $actionHandler = new LogoutAction();
                    break;

                case 'index':
                    $actionHandler = new IndexAction();                   
                    break;

                default:
                    Redirect::to('index');
                break;
          }

          $middlewareReference = $this->middlewares[$action] ?? null;

          if ($middlewareReference !== null) {
            
            (new $middlewareReference)();
          }
          
          $actionHandler();
     }

     private function loadDotEnvFile()
     {
          $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
          $dotenv->load();
     }
}