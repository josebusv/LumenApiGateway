<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService
{
  use ConsumesExternalServices;

  /**
   * The base uri to be used to concume the books service
   * @var string
   */
  public $baseUri;

  /**
   * The secret to be used to consume the authors service
   * @var string
   */
  public $secret;

  public function __construct()
  {
    $this->baseUri = config('services.books.base_uri');    
    $this->secret = config('services.books.secret');    
  }
  /**
   * Get the full list of books fron the books services
   * @return
   */
  public function obtainBooks()
  {
    //dd($this->baseUri);
    return $this->performRequest('GET', '/books');
  }
  /**
   * Create an instance of book using the books service
   * @return string
   */
  public function createBooks($data)
  {
    return $this->performRequest('POST', '/books', $data);
  }

  /**
   * Get a single book from the book services
   * @return string
   */
  public function obtainBook($book)
  {
    return $this->performRequest('GET', "/books/{$book}");
  }
  /**
   * Update a single book from the book services
   * @return string
   */
  public function editBook($data, $book)
  {
    return $this->performRequest('PUT', "/books/{$book}", $data);
  }
  /**
   * Remove a single book from the book services
   * @return string
   */
  public function deleteBook($book)
  {
    return $this->performRequest('DELETE', "/books/{$book}");
  }

}