# Laravel 9 透過 Cuttly 的縮網址服務

Cuttly 是一個線上縮網址工具，提供把冗長的網址縮短，讓原有的網址改頭換面。有些網址後面可能會夾帶參數或是中文字元等等，往往複製貼上後就會變成一長串，不但很不美觀，也不利分享或使用。另一個原因是過長的網址在 BBS 或手機裡面顯示時可能會被截斷，進而無法進入到你想要使用的網站，所以一般會透過短網址來解決這個問題。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/short-url/generate` 來使用短網址產生器。

----

## 畫面截圖
![](https://i.imgur.com/WsrGkjt.png)
> 將要縮短的網址貼上

![](https://i.imgur.com/4zOgEK5.gif)
> 點擊「產生」送出，讓原本所帶的 HTTP 參照位址能夠原封不動地帶到目的地網址去
