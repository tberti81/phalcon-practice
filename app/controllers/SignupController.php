<?php

class SignupController extends ControllerBase
{

    public function indexAction()
    {
	    $this->view->setVar('form', new SignupForm());
    }

	public function signupAction()
	{

		$form = new SignupForm();
		if (!$form->isValid($this->request->getPost()))
		{
			foreach ($form->getMessages() as $message)
			{
				$this->flash->error($message);
			}
		}
		else
		{
			$hash = $this->cryptPassword($this->request->getPost('password'), 10);

			echo $this->request->getPost('username') . ' ' . $this->request->getPost('password') . ' ' . $hash;

			$user = new User();
			$user->setUsername($this->request->getPost('username'));
			$user->setPassword($hash);
			$user->save();
		}
	}

	/**
	 * Crypt given password.
	 *
	 * @param string $password        Plain password.
	 * @param int    $securityLevel   Higher value means more secure hash but slower encryption.
	 *
	 * @return string   Password hash.
	 */
	private function cryptPassword($password, $securityLevel)
	{
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $securityLevel) . $salt;

		return crypt($password, $salt);
	}

}

