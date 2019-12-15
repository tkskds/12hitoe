## ディレクトリ構成

  - images

      ダイナミックヘッダーに使用するフィルター、404ページで使うアイキャッチ画像、アイキャッチが未設定の時に出力されるデフォルトのアイキャッチ画像など

  - lib

      独自のCSS/JS/PHPファイル。

  - parts

      部分テンプレート各種。基本的にindex.phpやheader.phpなどはここからカスタマイザーの値に合わせて部品を取り出す。
      ../functions/for_setupではheadクリーナーやテーマサポート、カスタマイザーの設定、ウィジェット・ショートコードの登録を、
      ../functions/for_templateではテンプレート用のアレコレを行う。

  - vendor

      materialize、delighter.js、plugin-update-checkerなど外部ベンダー提供のプラグインやライブラリ。サードパーティはここに。

## 仕様

  1. materializeベース
  2. カスタマイザーの値に合わせてHTML構成する
  3. カスタマイザーのチェックボックスはdefaultをfalseに。inputされた時にtrueとする。そのため、その点を考慮した項目設定およびコードの記述をする。
      （否定疑問形の項目名も辞さない）
      3-1. チェックボックスの項目をviewで呼び出す時はデフォルト値の指定は不要か
      3-2. たぶん三項演算子ミスったままめっちゃ記述してるから見かけ次第修正

## Caution!

  1. dont touch DIR NAME
  2. check mail box

## MEMO

  ### How to update theme version

      1. EDIT version in stylesheet
      2. EDIT version in json(../12hitoe/) file
      3. COMP

      ┈╱▔▔▔▔▔▔▔╲┈┈
      ┈▏┈┈╰╯╯╯┈▕┈┈
      ╭▏┈▕▏┗╮▎┈▕╮┈
      ╰▏┈┈┈┏╯┈┈▕╯┈
      ┈▏┈╲▂▂▂╱┈▕┈┈  < u wanna play?
      ┈╲┈┈┈┈┈┈┈╱┈┈
      ┈┈▔▔▏┈▕▔▔┈┈┈
