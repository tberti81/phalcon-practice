<?php

class AuthController extends ControllerBase
{

    public function indexAction()
    {

    }

	public function authAction()
	{
		$user = new User();
		$userRecord = $user->findFirst(array(
			'username = \'' . $this->request->getPost('username') . '\'',
		));

		if ($userRecord->getPassword() === crypt($this->request->getPost('password'), $userRecord->getPassword()))
		{
			echo 'Welcome ' . $this->request->getPost('username') . '!';
		}
		else
		{
			//echo 'Access denied for ' . $this->request->getPost('username') . '!';
			$this->dispatcher->forward(array('controller' => 'auth', 'action' => 'index'));
		}
	}

}

