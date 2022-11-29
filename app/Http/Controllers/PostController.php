<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Api\GorestService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function __construct(private readonly GorestService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws Exception
     */
    public function index(): Application|Factory|View
    {
        $posts = $this->service->getAll();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws Exception
     */
    public function comments(int $id): Application|Factory|View
    {
        $comments = $this->service->getComments($id);
        return view('posts.comments', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect()->back()->with('status', 'Post has deleted!');
    }
}
