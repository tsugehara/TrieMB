<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('TrieMB.class.php');
$tree = new TrieMB();
$tree->add('a');
$tree->add('ai ga tomaranai');
$tree->add('aiueo');
$tree->add('akasaatana');
$tree->add('kakikukeko');
$tree->add('あかさたな');
$tree->add('あいうえお');

$tests = array('a', 'ai', 'aiu', 'あ', 'あい');

echo '<div>';
echo '<h2>'.htmlspecialchars('All').'</h2>';
print_r($tree->getAll());
echo '</div>';

foreach ($tests as $test) {
    echo '<div>';
    echo '<h2>'.htmlspecialchars($test).'</h2>';
    print_r($tree->search($test));
    echo '</div>';
}
