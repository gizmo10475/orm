<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *  @ORM\Column(type="text")
     */
    private $name;

    /**
     *  @ORM\Column(type="integer")
     */
    private $isbn;

    /**
     *  @ORM\Column(type="text")
     */
    private $author;

    /**
     *  @ORM\Column(type="text")
     */
    private $img;

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
