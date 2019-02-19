<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryDivController extends AbstractController
{
    public function index(AuthorRepository $authorRepo, BookRepository $bookRepo, GenreRepository $genreRepo)
    {
        $bookAmount = $bookRepo->count([]);
        $randomBook = $bookAmount ? $bookRepo->findBy([], null, 1, rand()%$bookAmount)[0] : null;
        return $this->render('library_div/index.html.twig', [
            'authors' => $authorRepo->findBy([], null, 5),
            'books' => $bookRepo->findBy([], null, 5),
            'genres' => $genreRepo->findBy([], null, 5),
            'random_book' => $randomBook,
        ]);
    }
}
