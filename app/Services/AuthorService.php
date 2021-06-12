<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService{
    use ConsumesExternalService;

    /**
     * The base uri to consume book service
     * @var string
     */
    public $baseUri;
    public $secret;
    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Obtain the full list of books from site1
     * @return string
     */
    public function obtainAuthors(){
        return $this->performRequest('GET', '/authors');
    }
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    public function obtainAuthor($id)
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

    public function editAuthor($data, $id)
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    public function deleteAuthor($id)
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }
}