<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		$this->view->setVar('baseUri', $this->url->getBaseUri());
		$this->view->setVar('username', $this->session->get('user', 'Guest'));
		$this->view->setVar('sessionId', $this->session->getId());
		$this->tag->setTitle('Phalcon Practise Project');
	}
}
