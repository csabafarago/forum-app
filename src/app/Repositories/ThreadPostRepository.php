<?php

namespace App\Repositories;

use App\Models\ThreadPost;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ThreadPostRepository.
 */
class ThreadPostRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ThreadPost::class;
    }

    public function create($data)
    {
        $threadPost = new ThreadPost();
        $threadPost->created_by = Auth::user()->id;
        $threadPost->updated_by = Auth::user()->id;
        $threadPost->post = $data->post;
        $threadPost->thread_id = $data->thread_id;
        $threadPost->save();

        return $threadPost;
    }
}
