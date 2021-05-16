<?php

use App\Entity\Books;

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 5) {
    echo "Usage ${argv[0]} <name> <isbn> <author> <img>\n";
    exit(1);
}

$newBookName = $argv[1];
$newBookIsbn = $argv[2];
$newBookAuthor = $argv[3];
$newBookImg = $argv[4];

$book = new Books();
$book->setName($newBookName);
$book->setIsbn($newBookIsbn);
$book->setAuthor($newBookAuthor);
$book->setImg($newBookImg);

$entityManager->persist($book);
$entityManager->flush();

echo "Created Book with ID " . $book->getId() . "\n";
