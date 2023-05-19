<?php
namespace App\Controller;

use App\Entity\Book\Book;
use Specialist\Controller;
use Specialist\Http\Request\Request;


class BookController extends Controller
{

    public function index()
    {
        $book = new Book('PHP10', 1000);

        return $this->render('book/index', [
            'title' => 'Книги',
            'book'  => $book
        ]);
    }




    public function create(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $price = (float) $_POST['price'];
            file_put_contents('books.txt', "$title|$price\n", FILE_APPEND);
            $_SESSION['flash'] = 'Книгадобавлена';
            header('Location: /?action=addbook');
            die;
        }

        $flash = $_SESSION['flash'] ?? '';
        unset($_SESSION['flash']);

        return $this->render('form-add-book', [
            'title' => 'Добавление книги',
            'message' => $flash
        ]);
    }
}