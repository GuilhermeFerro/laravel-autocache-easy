# Laravel Auto Cache Easy
`EN`
- Package to perform the autocache in an easy way in Laravel with Redis
- This package was inspired by the `amitavroy/rediscache` and use it internally

`PT-BR`
- Pacote para realizar o autocache de uma forma easy no Laravel com Redis
- Este pacote foi inspirado no `amitavroy/rediscache` e o usa internamente

### Installation
```
composer require gsferro/autocacheeasy
```

### Dependencies
```
"predis/predis": "^1.1",
```

### Use
- Global instance
 ``` php
/**
* Package instance
* Instancia do pacote
*
* @param string $keyPrefix default null, 
* @param string $keyPrefixSeparetor default ':' 
* @return AutoCacheEasyService
*/
$autocacheeasy = autocacheeasy();
```

- Method Remember
``` php
/**
* Checks if the key exists in the redis cache, saves if it does not exist and returns the value
* Verifica se existe a chave no cache do redis, salva se não existir e devolve o valor
*
* @param string $key
* @param callable $callback
* @return mixed
*/
autocacheeasy()->remember(string $key, callable $callback)
```

- Method Retriver
``` php
/**
* Clear the current cache and save again
* Limpa o cache atual e salva novamente
*
* @param string $key
* @param callable $callback
* @param bool $all
* @return mixed
*/
autocacheeasy()->retriver(string $key, callable $callback, $all = false)
```

- Methods Packages Inspire/Dependencie

`EN`
- By using this package, you still retain all the functions of the dependency package.

`PT-BR`
- Ao usar este pacote, você ainda mantém todas as funções do pacote de dependência.

##### Method Package Inspire `amitavroy/rediscache`
- autocacheeasy()
>
> ->get() 
>
> ->set() 
>
> ->forget() 
>
> ->getAll() 
