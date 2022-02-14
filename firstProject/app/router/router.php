<?php 

  function routes(){
    return require "routes.php";
  }

  function exactMatchUriInArrayRoutes($uri, $routes){
    if(array_key_exists($uri, $routes)){
      return [$uri => $routes[$uri]];
    }
    return [];
  }

  function regularExpressionMatchArrayRoutes($uri, $routes){
    return (array_filter($routes, 
      function($value) use($uri){
        $regex = str_replace('/', '\/', ltrim($value, '/'));
        return preg_match("/^$regex$/", ltrim($uri, "/"));

      }, ARRAY_FILTER_USE_KEY)
    );
  }

  function verifyParams($uri, $matchedUri){
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return(array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, "/"))
        ));
    }
    return [];
  };

  function paramsFormat($uri, $params){
    
    $paramsData = [];
    
    foreach($params as $index => $param){
       $paramsData[$uri[$index - 1]] = $param;
    }
    return $paramsData;
  }

  function router()
  {
    // Primeiro pegamos a uri atual
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // pegamos as rotas
    $routes = routes();
    // Verificamos se a uri atual bate com as url estáticas
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);
    // Se não bater com as estáticas verifica as dinâmicas
  
    $params = [];
    if(empty($matchedUri)){
      $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);
      $uri = explode('/', ltrim($uri, "/"));
      $params = verifyParams($uri, $matchedUri);
      $params = paramsFormat($uri, $params);
    }
    
    if(!empty($matchedUri)){
      return controller($matchedUri, $params);
    }
    throw new Exception('Algo deu errado');
  }
?>