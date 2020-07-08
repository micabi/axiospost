# axiosでpostしてphpで受け取り、結果をaxiosで読み取る

## axios側

### パターンA: URLSearchParams()を使ったpostの方法

インスタンスを作成し、appendでkey、valueを追加していく

```JavaScript
var params = new URLSearchParams();
params.append("test", "テスト");
params.append("action", "update");

axios.post('receive.php', params)
  .then()...
```

### パターンB: オブジェクト（連想配列）を使ったpostの方法

axios.post()の第二引数に連想配列形式でkey、valueを列記する

```JavaScript
var params = { test: "テスト" };

axios.post('receive.php', {
  action: "update",
  data: params
  })
  .then()...
```

### パターンC: FormData()を使ったpostの方法

インスタンスを作成し、appendでkey、valueを追加していく

```JavaScript
var params = new FormData();
params.append("test", "テスト");
params.append("action", "update");

var config = { headers: { 'Content-Type': 'multipart/form-data' } };

axios.post('receive.php', params, config)
  .then()...
```

## PHP側

### パターンA: axiosのURLSearchParams()形式で送られてきたpostの受け取りの方法

### パターンC: axiosのFormData()形式で送られてきたpostの受け取りの方法

通常のグローバル変数$_POST['key']で値を受け取る<br>
ただし、FormData()形式で送られてきたものはphp.iniで文字コードを適切に設定していない場合文字化けするので注意。

```PHP
$test = $_POST['test'];
$action = $_POST['action'];
```

### パターンB: axios.postの第二引数からのpostの受け取りの方法

axiosはjson形式でpostされてくるので連想配列に変換する必要がある。

```PHP
$postdata = json_decode(file_get_contents("php://input"), true) ; // jsonを連想配列化

print_r($postdata['data']['test']); // アクセスするときはこんな感じ。

```

### PHPでjsonの出力

axiosはデータをjson形式で受け取るので、連想配列をjson形式に変換して出力する必要がある。

```PHP
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
```
