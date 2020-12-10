<?php

declare(strict_types=1);

namespace App;

class Redirect
{
     public static function to(string $direction)
     {
          $protocol = $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' 
               ? 'http' 
               : 'https';
          
          return header("Location: {$protocol}://{$_SERVER['HTTP_HOST']}/?action={$direction}");
     }

}
