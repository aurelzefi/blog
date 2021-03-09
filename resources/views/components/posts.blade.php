<div>
    <div class="flex justify-end">
        <form method="GET" class="mb-4">
            <x-select :options="['desc' => __('Latest To First'), 'asc' => __('First To Latest')]" :current="$sort" />

            <input type="hidden" name="page" value="{{ $posts->currentPage() }}" />

            <x-button>
                {{ __('Sort') }}
            </x-button>
        </form>
    </div>

    @foreach ($posts as $post)
        <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <span>
                            {{ $post->title }}
                        </span>

                        <span class="block mt-1 text-sm text-gray-700">
                            {{ __('Posted by :user', ['user' => $post->user ? $post->user->name : 'Admin']) }}
                        </span>
                    </div>

                    <span class="text-sm text-gray-700 whitespace-nowrap">
                        {{ $post->published_at->diffForHumans() }}
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
