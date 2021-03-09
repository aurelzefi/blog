<div>
    <div class="flex justify-end">
        <form method="GET" class="mb-4">
            <select name="sort" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>
                    {{ __('Latest To First')  }}
                </option>

                <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>
                    {{ __('First To Latest')  }}
                </option>
            </select>

            <input type="hidden" name="page" value="{{ $posts->currentPage() }}" />

            <x-button>
                {{ __('Sort') }}
            </x-button>
        </form>
    </div>

    @foreach ($posts as $post)
        <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <div class="flex justify-between">
                        <span>
                            {{ $post->title }}
                        </span>

                        <span class="text-sm text-gray-700 whitespace-nowrap">
                            {{ $post->published_at->diffForHumans() }}
                        </span>
                    </div>

                    <span class="block mt-1 text-sm text-gray-700">
                        {{ __('Posted by :user', ['user' => $post->user ? $post->user->name : 'Admin']) }}
                    </span>
                </div>

                <p class="mt-4">
                    {{ $post->description }}
                </p>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>