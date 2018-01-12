<?php

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller {
	public function initialize() {
		$this->tag->setDoctype(Tag::HTML401_STRICT);
	}

}
