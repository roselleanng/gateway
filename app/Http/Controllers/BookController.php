<?php

namespace App\Http\Controllers;
//use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\BookService;
use App\Services\AuthorService;
use DB;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;
    public $authorService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all(),Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one user
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->bookService->obtainBook($id));
    }

    /**
     * Update an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $id));
    }
    
    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->successResponse($this->bookService->deleteBook($id));
    }
}