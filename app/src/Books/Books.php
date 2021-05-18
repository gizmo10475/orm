<?php

namespace App\Books;
use Doctrine\ORM\Mapping as ORM;


class Books
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $isbn;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $img;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

}
