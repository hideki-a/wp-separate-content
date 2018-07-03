# WP Separate Content

WordPressの投稿本文を`<!--more-->`の前後で分割します。  
Movable Typeの`MTEntryBody`, `MTEntryMore`相当の働きを実現します。

## 使い方

### moreより前を出力

```
<?php WPSeparateContent::the_content_of_body(); ?>
```

Movable Typeの`MTEntryBody`相当です。

### moreより後を出力

```
<?php WPSeparateContent::the_content_of_more(); ?>
```

Movable Typeの`MTEntryMore`相当です。

## 実装参考

`the_content()`の実装を参考にしました。

- [wp-includes/post-template.php](https://core.trac.wordpress.org/browser/tags/4.9.6/src/wp-includes/post-template.php)
