<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Threads') }} ({{ $threads->count() }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <filter-component :options="{{ json_encode($categories, true) }}"></filter-component>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        @forelse ($threads as $thread)
                            <p class="static border-2 border-blue-200 mb-4 p-2 pr-64 rounded-lh bg-blue-100 relative h-32">
                                <a href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }} </a>
                                <span class="absolute top-0 right-0 border-1 rounded-bl-lg bg-green-300 color py-1 px-1">{{ $thread->category->name }}</span>
                                <span class="absolute top-10 right-4">Created by {{ $thread->createdBy->name }}</span>
                                <span class="absolute top-16 right-4">Created on {{ date('d-m-Y', strtotime($thread->created_at))  }}</span>
                            </p>
                        @empty
                            <p>
                                No posts found in this thread.
                            </p>
                        @endforelse
                    </div>

                    <?php echo $threads->render(); ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
