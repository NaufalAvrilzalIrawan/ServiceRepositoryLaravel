<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    /**
     * PostService constructor
     * 
     * @param PostRepository $postRepository
     */
    public function __construct(PostService $postService) {

        $this->postService = $postService;
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getAll();
        }
        catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return view('post.index', [
            'hasil' => $result['data'],
            'status' => $result['status']
        ]);
        // var_dump($result['data']);

        // return response()->json($result['data'], $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'judul',
            'deskripsi',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->savePostData($data);
        }
        catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        // return response()->json($result, $result['status']);
        // return view('post.index');
        return Redirect('/posts');
    }

    /**
     * Display the specified resource.
     * 
     * @param id
     * @return \Iluminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getById($id);
        }
        catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        // return response()->json($result, $result['status']);
        return view('post.edit', [
            'hasil' => $result['data'],
            'status' => $result['status']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update post.
     * 
     * @param Request $request
     * @param id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'judul',
            'deskripsi',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->updatePost($data, $id);
        }
        catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return Redirect('/posts');
        
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->deleteById($id);
        }
        catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return Redirect('/posts');
    }
}
