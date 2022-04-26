<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller
{

  public function index($request, $response, $args)
  {
    $posts = new Post;

    return $response->withJSON($posts->getInitialPosts());
  }

  public function create($request, $response, $args)
  {
    $posts = new Post;

    $user = $request->getParam('user');
    $image = $request->getParam('image');
    $caption = $request->getParam('caption');

    return $response->withJSON($posts->createPost($user, $image, $caption));
  }
}
