<?php
class TTrieMB {
	var $trie = array();
	var $s;
	function __construct($s=NULL){
		$this->s = $s;
	}

	function add($s, $i=0, $l=NULL){
		if (! $l) {
			$l = mb_strlen($s);
			if (! $l)
				throw new Exception('Invalid argument');
		}

		$c = mb_substr($s, $i, 1);
		if ($i == ($l-1)) {
			if (! array_key_exists($c, $this->trie)) {
				$this->trie[$c] = new TTrieMB($s);
			} else {
				$this->trie[$c]->s = $s;
			}
			return TRUE;
		}

		if (! array_key_exists($c, $this->trie))
			$this->trie[$c] = new TTrieMB();

		return $this->trie[$c]->add($s, $i+1, $l);
	}

	function search($s, $type='a') {
		if (strlen($type) != 1)
			return FALSE;
		$func = 'search'.strtoupper($type);
		return $this->$func($s);
	}

	function searchO($s, $i=0, $l=NULL){
		if (! $l) {
			$l = mb_strlen($s);
			if (! $l)
				throw new Exception('Invalid argument');
		}

		$c = mb_substr($s, $i, 1);
		if ($i == ($l-1)) {
			if (array_key_exists($c, $this->trie))
				return $this->trie[$c];

			return FALSE;
		}

		if (! array_key_exists($c, $this->trie))
			return FALSE;

		return $this->trie[$c]->searchO($c, $i+1, $l);
	}

	function searchA($s, $i=0, $l=NULL){
		if (! $l) {
			$l = mb_strlen($s);
			if (! $l)
				throw new Exception('Invalid argument');
		}

		$c = mb_substr($s, $i, 1);
		if ($i == ($l-1)) {
			if (array_key_exists($c, $this->trie))
				return $this->trie[$c]->getAll();

			return FALSE;
		}

		if (! array_key_exists($c, $this->trie))
			return FALSE;

		return $this->trie[$c]->searchA($s, $i+1, $l);
	}

	function getAll() {
		$ret = array();

		if ($this->s)
			$ret[] = $this->s;

		foreach ($this->trie as $k => $v) {
			$ret = array_merge($ret, $v->getAll());
		}

		return $ret;
	}
}
?>