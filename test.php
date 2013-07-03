<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('TrieMB.class.php');
$tree = new TrieMB();
$tree->add('a');
$tree->add('ai ga tomaranai');
$tree->add('aiueo');
$tree->add('akasaatana');

$tests = array('a', 'ai', 'aiu');
foreach ($tests as $test) {
    echo '<div>';
    echo '<h2>'.htmlspecialchars($test).'</h2>';
    print_r($tree->search($test));
    echo '</div>';
}
