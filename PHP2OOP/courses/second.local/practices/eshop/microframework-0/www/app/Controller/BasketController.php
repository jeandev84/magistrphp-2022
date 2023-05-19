<?php
namespace App\Controller;

use Specialist\Controller;
use Specialist\Http\Request\Request;
use Specialist\Http\Response\Response;


class BasketController extends Controller
{


    /**
     * @return Response
    */
    public function index(): Response
    {
        return $this->render('basket/index', [
            'title' => 'Корзина'
        ]);
    }




    /**
     * @param Request $request
     * @return
    */
    public function add(Request $request)
    {
         $bookId = $request->queries->get('id');

         return $this->redirectTo('/');
    }




    /**
     * @return
    */
    public function delete()
    {
         return $this->redirectTo('/basket');
    }
}