TrieMB
======

Trie implementation for PHP. (Supported Multibyte strings.)

======

Trie構造のPHP実装です。

日本で使いやすいようにマルチバイトを前提にしています。

こんな感じで使ってください。
```php
mb_internal_encoding('UTF-8');
require_once('TrieMB.class.php');
$trie = TrieMB();
$trie->add('こんにちは');
$trie->add('こんばんは');
var_dump($trie->search('こん'));
```

全件マッチをする場合、第二引数にOを入れて戻り値をオブジェクトとして受け取った方がいいかもしれません。
```php
mb_internal_encoding('UTF-8');
require_once('TrieMB.class.php');
$trie = TrieMB();
$trie->add('こんにちは');
$trie->add('こんばんは');
var_dump($trie->search('こん', 'o'));
```
