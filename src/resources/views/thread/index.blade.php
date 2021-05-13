<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container threads">
                        @forelse ($allThreads as $thread)
                            <p class="static border-2 border-blue-200 mb-4 p-2 pr-64 rounded-lh bg-blue-100 relative h-20">
                                <a href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }} </a>
                                <span>{{ $thread->category->name }}</span>
                                <span class="absolute top-2 right-4">Created by {{ $thread->createdBy->name }}</span>
                                <span class="absolute top-8 right-4">Created on {{ date('d-m-Y', strtotime($thread->created_at))  }}</span>
                            </p>
                        @empty
                            <p>
                                No posts found in this thread.
                            </p>
                        @endforelse
                    </div>

                    <?php echo $allThreads->render(); ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
