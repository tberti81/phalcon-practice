<?php

class AuthController extends ControllerBase
{

    public function indexAction()
    {
	    $this->view->setVar('form', new AuthForm());
    }

	public function authAction()
	{
		$form = new AuthForm();
		if (!$form->isValid($this->request->getPost()))
		{
			foreach ($form->getMessages() as $message)
			{
				$this->flash->error($message);
			}
		}
		else
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
				$this->dispatcher->forward(array('controller' => 'auth', 'action' => 'index'));
			}
		}
	}

}

