<?php

/**
 * LoginForm класс описывающий форму входа
*/
class LoginForm
{
     /**
      * @Form\Types\Text
      * @Form\Name('login')
     */
     public $login;



     /**
      * @Form\Types\Password
      * @Form\Name('password')
     */
     public $password;



     /**
      * @Form\Types\Checkbox
      * @Form\Name('rememberMe')
      * @var string
     */
     public $rememberMe;



     /**
      * @Form\Types\Checkbox
      * @Form\Name('agree')
     */
     public $agree;
}