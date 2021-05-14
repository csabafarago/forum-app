<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadRequest;
use App\Models\Category;
use App\Models\Thread;
use App\Models\ThreadPost;
use App\Repositories\ThreadRepository;
use Illuminate\Support\Facades\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all('id', 'name');

        $default_selected = request('category_id','');

        if(request()->has('category_id')){
            $threads = Thread::where('category_id', request('category_id'))->paginate(2);
        } else {
            $threads = Thread::paginate(2);
        }

        return view('thread.index', [
            'threads' => $threads->appends(Request::except('page')),
            'categories' => $categories,
            'default_selected' => $default_selected
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('thread.create',
            [
                'categories' => Category::all()
                    ->keyBy('id')
                    ->pluck('id', 'name')
                    ->toArray()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThreadRequest $request, ThreadRepository $threadRepository)
    {
        $this->middleware('auth');
        $thread = $threadRepository->create($request);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::with('category')->findOrFail($id);

        $posts = ThreadPost::where('thread_id',$id)->get();

        return view('thread.show', [
            'thread' => $thread,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
