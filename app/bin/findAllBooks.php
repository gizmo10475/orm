<?php

require_once __DIR__ . "/bootstrap.php";

$productRepository = $entityManager->getRepository('\App\Books\Books');
$books = $productRepository->findAll();

echo "All books\n--------------------\n";

if ($books) {
    foreach ($books as $book) {
        echo sprintf("%2d - %s (%d) %s %s\n",
            $book->getId(),
            $book->getName(),
            $book->getIsbn(),
            $book->getAuthor(),
            $book->getImg()
        );
    }
} else {
    echo " (empty)\n";
}
