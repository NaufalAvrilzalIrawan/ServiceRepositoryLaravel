<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository {

    /**
     * @var post
     */
    protected $post;

    /**
     * PostRepository constructor
     * 
     * @param Post $post
     */
    public function __construct(Post $post) {
        
        $this->post = $post;
    }

    /**
     * Save Post
     * 
     * @param $data
     * @return Post
     */

    public function save($data) {

        $post = new $this->post;

        $post->judul = $data['judul'];
        $post->deskripsi = $data['deskripsi'];

        $post->save();

        return $post->fresh();
    }


     /**
     * Save Post
     * 
     * @return Post
     */
    public function getAllPost() {

        return $this->post->get();
    }


    /**
     * Get post by id
     * 
     * @param $id
     * @return mixed
     */

    public function getById($id) {

    return $this->post->where('id', $id)->get();
    }


    /**
     * Update Post
     * 
     * @param $data
     * @return Post
     */
    public function update($data, $id) {

        $post = $this->post->find($id);

        $post->judul = $data['judul'];
        $post->deskripsi = $data['deskripsi'];

        $post->update();

        return $post;
    }


    /**
     * Delete Post
     * 
     * @param $data
     * @return Post
     */
    public function delete($id) {

        $post = $this->post->find($id);
        $post->delete();

        return $post;
    }
}