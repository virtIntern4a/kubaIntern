<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\GenreRepository;
use App\Utils\RandomBookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryDivController extends AbstractController
{
    public function index(
        AuthorRepository $authorRepo,
        BookRepository $bookRepo,
        GenreRepository $genreRepo,
        RandomBookService $randomBookService
    ) {
        return $this->render('library_div/index.html.twig', [
            'authors' => $authorRepo->findBy([], null, 5),
            'books' => $bookRepo->findBy([], null, 5),
            'genres' => $genreRepo->findBy([], null, 5),
            'last_random_book' => $randomBookService->getLastBook(),
        ]);
    }
}
