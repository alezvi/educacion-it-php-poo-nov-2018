<?php

require 'User.php';
require 'Exceptions/InvalidPasswordException.php';

class Registration
{
    /**
     * @var User
     */
    private $user;

    /**
     * Registration constructor.
     */
    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('El email no es valido', 422);
        }

        $this->user->setEmail($email);
    }

    /**
     * @param $password
     * @throws InvalidPasswordException
     */
    public function setPassword($password)
    {
        if (strlen($password) < Usuario::PASSWORD_MIN || strlen($password) > Usuario::PASSWORD_MAX) {
            throw new InvalidPasswordException('El password debe ser entre ' . Usuario::PASSWORD_MIN . ' y ' .
                Usuario::PASSWORD_MAX . ' caracteres', 422);
        }

        $this->user->setPassword($password);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function save()
    {
        $sql = "insert into `users` (`email`, `password`, `created_at`) values ('%s', '%s', '%s')";
        
        return printf($sql, 
            $this->user->getEmail(), 
            $this->user->getPassword(), 
            $this->user->getCreatedAt()
        );
    }
}
