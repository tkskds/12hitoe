
## ディレクトリ構成

  - images

      ダイナミックヘッダーに使用するフィルター、404ページで使うアイキャッチ画像、アイキャッチが未設定の時に出力されるデフォルトのアイキャッチ画像など
      
  - lib

      独自のCSS/JS/PHPファイル。

  - parts

      部分テンプレート各種。基本的にindex.phpやheader.phpなどはここからカスタマイザーの値に合わせて部品を取り出す。

  - vendor

      materialize、delighter.js、plugin-update-checkerなど外部ベンダー提供のプラグインやライブラリ。サードパーティはここに。

## Caution

  1. Dont Touch Dir Name( "12hitoe-master" )

## MEMO

  ### How to update theme version

      1. EDIT version in stylesheet
      2. EDIT version in json(../12hitoe/) file
      3. COMP
      
▕▔▔▔▔▔▔▔╲
▕╮╭┻┻╮╭┻┻╮╭▕╮╲
▕╯┃╭╮┃┃╭╮┃╰▕╯╭▏
▕╭┻┻┻┛┗┻┻┛ ╰▏   ▏
▕╰━━━┓┈┈┈╭╮▕╭╮▏
▕╭╮╰┳┳┳┳╯╰╯▕╰╯▏
▕╰╯┈┗┛┗┛┈╭╮▕╮┈▏
