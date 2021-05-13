<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add thread') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('threads.store') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <div>
                                <x-label for="title" :value="__('Thread title')" />

                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />

                                <x-label for="name" :value="__('Category')" />

                                <select name="category_id" id="input-category-id" class="block mt-1 w-full">
                                    <option value="">-</option>
                                    @foreach ($categories as $name => $value)
                                        <option value="{{ $value }}" {{ $value == old('category_id') ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
