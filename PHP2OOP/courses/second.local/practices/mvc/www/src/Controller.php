<?php
namespace Specialist;

use App\Entity\Book;
use Specialist\Http\Response\Response;
use Specialist\Templating\View;


class Controller
{

     protected $view;


     public function __construct()
     {
         $this->view = new View(__DIR__.'/../views');
     }


    public function index()
    {
        return $this->render('index', [
            'title' => 'Главная страница'
        ]);
    }


    public function about()
    {
        return $this->render('about', [
            'title' => 'О нас'
        ]);
    }



    public function book()
    {
         $book = new Book('PHP10', 1000);

         return $this->render('book', [
             'title' => 'Книги',
             'book'  => $book
         ]);
    }




    public function addbook()
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



    /**
     * @param string $template
     * @param array $params
     * @return string
    */
    public function render(string $template, array $params = []): string
    {
        return $this->view->render($template, $params);
    }
}