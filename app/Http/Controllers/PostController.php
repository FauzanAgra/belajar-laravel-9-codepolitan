<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts
        ];

        return view('posts.index', $view_data);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('posts.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        $post = Post::create([
            'title' => $title,
            'content' => $content
        ]);

        Mail::to(Auth::user()->email)->send(new BlogPosted($post));

        $this->notifyTelegram($post);

        return redirect('posts');
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $post =  Post::where('id', $id)->first();
        $comments = $post->comments()->get();
        $totalComments = $post->totalComments();

        $view_data = [
            'post' => $post,
            'comments' => $comments,
            'totalComments' => $totalComments
        ];

        return view('posts.show', $view_data);
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $post =  Post::where('id', $id)->first();

        $view_data = [
            'post' => $post
        ];

        return view('posts.edit', $view_data);
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $title = $request->title;
        $content = $request->content;

        Post::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        return redirect("posts/{$id}");
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        Post::where('id', $id)->delete();

        return redirect("posts");
    }

    private function notifyTelegram($post)
    {
        $apiToken = env('API_TELEGRAM');
        $chatId = env('CHAT_ID');

        $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
        $content = "Ada Postingan Baru nih dengan Judul: <strong>\"{$post->title}\"</strong>";

        $data = [
            "chat_id" => $chatId,
            "text" => $content,
            "parse_mode" => 'HTML'
        ];

        Http::post($url, $data);
    }
}
