<?php

declare(strict_types=1);

namespace App;

class ViewRenderer
{
    public function __construct(string $viewPath, array $params = [])
    {
        extract($params);
        include "views/$viewPath.phtml";
        exit();
    }
}
