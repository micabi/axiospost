// A: URLSearchParams()を使ったpostの方法

var params = new URLSearchParams();
params.append("test", "テスト");
params.append("action", "update");

axios.post('receive.php', params)
  .then((response) => {
    console.log(response.data.result);
  })
  .catch((error) => {
    console.log(error);
  });



// B: オブジェクト(連想配列)を使ったpostの方法

// var params = { test: "テスト" };

// axios.post('receive.php', {
//   action: "update",
//   data: params
// })
//   .then((response) => {
//     console.log(response.data.result);
//   })
//   .catch((error) => {
//     console.log(error);
//   });