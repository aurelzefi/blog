<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Create New Post') }}</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Fill in the title and description to create a new post.') }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="title" value="{{ __('Title') }}" />
                                    <x-input id="title" type="text" name="title" class="mt-1 block w-full" :value="old('title')" autofocus />
                                    <x-input-error for="title" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="description" value="{{ __('Description') }}" />
                                    <x-textarea id="description" name="description" rows="10" class="mt-1 block w-full" :value="old('description')" />
                                    <x-input-error for="description" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
