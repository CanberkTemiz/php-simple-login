<?php

declare(strict_types=1);

namespace App\Actions;

use App\Connection;
use App\SessionManager;
use App\ViewRenderer;
use PDO;

class PostLoginFormAction
{
     public function __invoke()
     {
          $params = $_POST;

          $loginName = $params['login_name'];
          $password = $params['password'];
     
          $statement = Connection::getInstance()
               ->prepare('select * from users where (username = :loginName OR email = :loginName) AND (password = :password)');

          $statement->bindValue('loginName', $loginName);
          $statement->bindValue('password', $password);
          $statement->setFetchMode(PDO::FETCH_ASSOC);
          $statement->execute();

          $user = $statement->fetch();

          if (!$user) {
               new ViewRenderer('login', [
                    'errorMessage' => 'Cannot find a user with this username/email and password combination'
               ]);
          }
               
          SessionManager::set('user', $user);
          
          new ViewRenderer('home', [
               'user' => $user,
          ]);
     }
}