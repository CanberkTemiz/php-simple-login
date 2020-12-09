<?php

declare(strict_types=1);

namespace App;

class ViewRenderer
{
     public function __construct(string $viewPath, array $params = [])
     {
          // var_dump($params); exit();
          extract($params);
          include "views/$viewPath.phtml";
          exit();
     }
}