<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Thread;

/**
 * Class ThreadRepository.
 */
class ThreadRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Thread::class;
    }

    /**
     * @param array $data
     * @return Category|\Illuminate\Database\Eloquent\Model
     */

    public function create($data)
    {
        $thread = new Thread();
        $thread->created_by = Auth::user()->id;
        $thread->updated_by = Auth::user()->id;
        $thread->title = $data->title;
        $thread->category_id = $data->category_id;
        $thread->save();

        return $thread;
    }
}
