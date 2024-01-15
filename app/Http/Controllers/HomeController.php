<?php
namespace App\Http\Controllers;
Use App\Models\Post;
Use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    public function index()
//    {
//        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
//        return view('home', compact('posts'));
//    }
      public function index(Request $request)
      {
          $sortOptions = [
              'created_at_desc' => 'Newest First',
              'created_at_asc' => 'Oldest First',
              'user' => 'Sort by User',

          ];

          $sort = $request->input('sort', 'created_at_desc');
          $query = Post::query();
          switch ($sort) {
              case 'created_at_desc':
                  $query->orderBy('created_at', 'desc');
                  break;
              case 'created_at_asc':
                  $query->orderBy('created_at', 'asc');
                  break;
              case 'user':
                  $query->orderBy('user_id', 'asc');
                  break;

              default:
                  $query->latest();
          }
          $posts = $query->get();

          return view('home', compact('posts', 'sortOptions', 'sort'));
      }
}

?>
