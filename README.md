# php curl工具类

## 实例
- 使用GET方式请求数据(不包含请求头):

```
    // Curl::getRaw( string $url, string $method, [ array $params] ) : string;
    $url     = 'www.mini-geek.com'; 
    $rawHtml = Curl::getRaw( $url, 'GET', [ 'name' => 'otorain' ] );
```

- 使用GET方式请求接口(接口数据类型为json)获取数据:
```
    // Curl::get( string $url, [ array $params ] ) : array;
    $url        = 'www.mini-geek.com';
    $data       = Curl::get( $url, [ 'name' => 'otorian' ] );
```

- POST方式请求数据同上