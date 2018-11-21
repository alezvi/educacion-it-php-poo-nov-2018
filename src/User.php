<?php

class User
{
    /**
     * @var string
     */
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @var int
     */
    const PASSWORD_MIN = 8;

    /**
     * @var int
     */
    const PASSWORD_MAX = 12;

    /**
     * @var int 
     */
    public static $COUNTER = 0;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        self::$COUNTER++;

        $this->setCreatedAt();
    }

    /**
     * @return void
     */
    private function setCreatedAt()
    {
        $this->createdAt = new DateTime;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id = 0)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $format
     * @return string
     */
    public function getCreatedAt(string $format = null): string
    {
        $format = $format ?? self::DATE_FORMAT;

        return $this->createdAt->format($format);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
