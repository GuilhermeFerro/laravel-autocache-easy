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
- Global instance `autocacheeasy()`
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

- Alias `autocache()`
``` php
/**
* Alias small for autocacheeasy().
*
* @return Gsferro\AutoCacheEasy\Services\AutoCacheEasyService
*/
$autocache = autocache();
```

- Method Remember
``` php
autocacheeasy()->remember(string $key, $ttl, \Closure $callback)
```

- Method RememberForever
``` php
autocacheeasy()->remember(string $key, $ttl, \Closure $callback)
```

- Method Retriver
``` php
autocacheeasy()->retriver(string $key, \Closure $callback, $all = false)
```

### Methods Packages Inspire/Dependencie

`EN`
- By using this package, you still retain all the functions of the dependency package.

`PT-BR`
- Ao usar este pacote, você ainda mantém todas as funções do pacote de dependência.

##### Method Package Depedence `\Illuminate\Cache\CacheManager`
`EN`
- To access the cache directly

`PT-BR`
- Para ter acesso ao cache diretamente

``` php
autocacheeasy()->cache
``` 

##### Method Package Depedence `predis/predis`
`EN`
- To access the predis directly

`PT-BR`
- Para ter acesso ao predis diretamente

``` php
autocacheeasy()->redis
``` 
##### Method Package Inspire `amitavroy/rediscache`

``` php
autocacheeasy()->get($key) 

autocacheeasy()->set($key, $value) 

autocacheeasy()->getAll($key) 

autocacheeasy()->forget($key, $wildcard = false) 
``` 

### Package `ResponseView`
`EN`
- Response easy the dates from views 
- add Trait `ResponseViewCache` in your Controller

`PT-BR`
- Forma fácil de adicionar dados para o response de views
- Adicionar a trait `ResponseViewCache` no seu Controller

- url: https://packagist.org/packages/gsferro/responseview

- Method `addDataCache`
``` php
/**
* Easily add an item to ResponseView :: $ data and cache it
* Adicionar forma fácil um item ao ResponseView::$data e coloca no cache
*
* @param string $key
* @param callable $value
* @param int $time 60
*/
$this->addDataCache(string $key, callable value, int $time 60)
```

- Method `addMergeDataCache`
``` php
/**
* Easily add an item to ResponseView::$mergeData and cache it
* Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
*
* @param string $key
* @param callable $value
* @param int $time 60
*/
$this->addMergeDataCache(string $key, callable value, int $time 60)
```

- Method `addDataOtherKeyCache`
``` php
/**
* Easily add an item to ResponseView::$data and cache it
* Adicionar forma fácil um item ao ResponseView::$data e coloca no cache
*
* @param string $key
* @param string $keyCache
* @param callable $value
* @param int $time 60
*/
$this->addDataOtherKeyCache( string $key, string $keyCache, callable value, int $time 60 )
```

- Method `addMergeDataOtherKeyCache`
``` php

/**
* Easily add an item to ResponseView::$mergeData and cache it
* Adicionar forma fácil um item ao ResponseView::$mergeData e coloca no cache
*
* @param string $key
* @param string $keyCache
* @param callable $value
* @param int $time 60
*/
$this->addMergeDataOtherKeyCache( string $key, string $keyCache, callable value, int $time 60 ) 
``` 