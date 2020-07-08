<?php

// A: axiosのURLSearchParams形式で送られてきたpostの受け取りの方法
// C: axiosのFormData()形式で送られてきたpostの受け取りの方法
// ただし、FormData()形式で送られてきたものはphp.iniでの設定を適切にしないと文字化けする

$test = $_POST['test']; // 通常通りphpでpostを受ける
$action = $_POST['action'];

if ($action === 'update') {
    $result = array( // axiosで結果をjson形式で受け取るために連想配列に入れてやる
    'result' => $test
  );

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result); // 連想配列をjson形式に変換して出力axiosに受け取ってもらう
}


// B: axios.postの第二引数からのpostの受け取りの方法

// axiosはjson形式でpostされてくるので連想配列に変換
// $postdata = json_decode(file_get_contents("php://input"), true) ;
// // print_r($postdata['data']['test']);

// if ($postdata['action'] === 'update') {
//     $result = array( // axiosで結果をjson形式で受け取るために連想配列に入れてやる
//     'result' => $postdata['data']['test']
//   );
// }

// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($result); // 連想配列をjson形式に変換して出力しaxiosに受け取ってもらう
