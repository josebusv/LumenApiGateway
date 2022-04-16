<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService
{
  use ConsumesExternalServices;

  /**
   * The base uri to be used to concume the authors service
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
    $this->baseUri = config('services.authors.base_uri');    
    $this->secret = config('services.authors.secret');    
  }
  /**
   * Get the full list of authors fron the authors services
   * @return
   */
  public function obtainAuthors()
  {
    //dd($this->baseUri);
    return $this->performRequest('GET', '/authors');
  }
  /**
   * Create an instance of author using the authors service
   * @return string
   */
  public function createAuthors($data)
  {
    return $this->performRequest('POST', '/authors', $data);
  }

  /**
   * Get a single author from the author services
   * @return string
   */
  public function obtainAuthor($author)
  {
    return $this->performRequest('GET', "/authors/{$author}");
  }
  /**
   * Update a single author from the author services
   * @return string
   */
  public function editAuthor($data, $author)
  {
    return $this->performRequest('PUT', "/authors/{$author}", $data);
  }
  /**
   * Remove a single author from the author services
   * @return string
   */
  public function deleteAuthor($author)
  {
    return $this->performRequest('DELETE', "/authors/{$author}");
  }
}