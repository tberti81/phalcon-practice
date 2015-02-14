<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class SignupForm extends Form
{
	public function initialize()
	{
		$this->setAction('signup/signup');

		$username = new Text('username', array('maxlength' => 32, 'placeholder' => 'Type here your username'));
		$username->addValidator(new PresenceOf(array('message' => 'Username is required!')));
		$username->addValidator(new StringLength(array('min' => 3, 'messageMinimum' => 'Username required minimum length is 3!')));
		$this->add($username);

		$password = new Password('password', array('maxlength' => 32));
		$password->addValidator(new PresenceOf(array('message' => 'Password is required!')));
		$password->addValidator(new StringLength(array('min' => 8, 'messageMinimum' => 'Password required minimum length is 8!')));
		$this->add($password);

		$passwordConfirmed = new Password('password_confirmed', array('maxlength' => 32));
		$passwordConfirmed->addValidator(new PresenceOf(array('message' => 'Confirm password is required!')));
		$passwordConfirmed->addValidator(new Confirmation(array('with' => 'password', 'message' => 'Confirmed passwords don\'t match!')));
		$this->add($passwordConfirmed);

		$submit = new Submit('submit', array('value' => 'Sign up'));
		$this->add($submit);
	}
} 