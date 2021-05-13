<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $thread->title }} <span class="font-weight-bold text-sm text-blue-700"n>{{ $thread->category->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="container">
                        @forelse ($posts as $post)
                            <p class="border-2 border-red-200 mb-4 p-2 rounded-lh bg-red-100 relative h-20">
                            {{ $post->post }}
                            <span class="absolute top-2 right-4">Posted by {{ $post->createdBy->name }}</span>
                            <span class="absolute top-8 right-4">Posted on {{ date('d-m-Y', strtotime($thread->created_at))  }}</span>
                        </p>
                        @empty
                            <p>
                                No posts found in this thread.
                            </p>
                    @endforelse
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200">

                @if(Auth::check())
                    Post new comment
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('thread-post.store') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <div>
                                <x-label for="post" :value="__('Your post')" />

                                <x-textarea id="post" class="block mt-1 w-full" type="text" name="post" :value="old('title')" required/>
                                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                @else
                    <p>
                        Sign in to post your comment
                    </p>
                @endif
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
