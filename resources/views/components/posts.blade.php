<div>
    @foreach ($posts as $post)
        <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <div class="flex justify-between">
                                <span>
                                    {{ $post->title }}
                                </span>

                        <span class="text-sm text-gray-700">
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
