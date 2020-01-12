![forReadme-min](https://user-images.githubusercontent.com/48539551/72215889-cebd5780-355c-11ea-9ae0-d8e3996f27d9.png)

<h2 align="center">👘 WordPressテーマ『十二単』</h2>

<p align="center">
  <a href="https://ja.wordpress.com/">
    <img src="https://user-images.githubusercontent.com/48539551/72215971-f6f98600-355d-11ea-9e01-4b32e99e86f7.png" height="45px;">
  </a>
  <a href="https://www.php.net/">
    <img src="https://user-images.githubusercontent.com/48539551/72216138-80aa5300-3560-11ea-97ca-20ee6ea2e24e.png" width="45px;">
  </a>
  <a href="https://materializecss.com/">
    <img src="https://user-images.githubusercontent.com/48539551/72215994-4dff5b00-355e-11ea-82d5-08b4f3bbe801.png" height="45px;">
  </a>
</p>

## 🌐 ThemeURL

### **https://withdiv.com/12hitoe**

## 💬 Usage

`$ git clone https://github.com/tkskds/12hitoe.git`

## 👀 Author

- **https://twitter.com/tkskds**
- **https://takasaki.work**

## 📂 ディレクトリ構成

### 📸 ../images

ダイナミックヘッダーに使用するフィルター、404ページで使うアイキャッチ画像、アイキャッチが未設定の時に出力されるデフォルトのアイキャッチ画像など

### 📖 ../lib

独自のCSS/JS/PHPファイル。

### 🧩 ../parts

部分テンプレート各種。基本的にindex.phpやheader.phpなどはここからカスタマイザーの値に合わせて部品を取り出す。

- ../functions/for_setupではheadクリーナーやテーマサポート、カスタマイザーの設定、ウィジェット・ショートコードの登録を、
- ../functions/for_templateではテンプレート用のアレコレを行う。

### 👇 ../vendor

materialize、delighter.js、plugin-update-checkerなど外部ベンダー提供のプラグインやライブラリ。サードパーティはここに。

## 📖 仕様

1. materializeベース
2. カスタマイザーの値に合わせてHTML構成する

---------

## 🖋 MEMO

### 📚 How to update theme version

1. EDIT version in stylesheet
2. EDIT version in json(../12hitoe) file
3. DONE

┈╱▔▔▔▔▔▔▔╲┈┈
┈▏┈┈╰╯╯╯┈▕┈┈
╭▏┈▕▏┗╮▎┈▕╮┈
╰▏┈┈┈┏╯┈┈▕╯┈
┈▏┈╲▂▂▂╱┈▕┈┈  < u wanna play?
┈╲┈┈┈┈┈┈┈╱┈┈
┈┈▔▔▏┈▕▔▔┈┈┈
