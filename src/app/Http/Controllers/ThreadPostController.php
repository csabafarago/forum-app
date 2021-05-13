<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadPostRequest;
use App\Models\ThreadPost;
use App\Repositories\ThreadPostRepository;
use Illuminate\Http\Request;

class ThreadPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThreadPostRequest $request, ThreadPostRepository $threadPostRepository)
    {
        $threadPost = $threadPostRepository->create($request);

        return redirect(route('threads.show', $request->get('thread_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThreadPost  $threadPost
     * @return \Illuminate\Http\Response
     */
    public function show(ThreadPost $threadPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThreadPost  $threadPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ThreadPost $threadPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThreadPost  $threadPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThreadPost $threadPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThreadPost  $threadPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThreadPost $threadPost)
    {
        //
    }
}
