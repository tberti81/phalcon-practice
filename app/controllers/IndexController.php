<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    $this->view->setVar('project', 'Phalcon Practise Project');
    }

}

