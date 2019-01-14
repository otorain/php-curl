# php curl工具类

## 实例
- 使用GET方式请求数据(不包含请求头):

```
    // string Curl::getRaw( string $url, string $method, [ array $params] );
    $url     = 'www.mini-geek.com'; 
    $rawHtml = Curl::getRaw( $url, 'GET', [ 'name' => 'otorain' ] );
```

- 使用GET方式请求接口获取数据(返回数组格式):
```
    // array Curl::get( string $url, [ array $params ] );
    $url        = 'www.mini-geek.com';
    $data       = Curl::get( $url, [ 'name' => 'otorian' ] );
```

- POST方式请求数据同上