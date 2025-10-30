<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chi tiết bài viết #{{ $article->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-xl font-bold mb-2">{{ $article->title }}</h3>
                <div class="mb-4 text-gray-700">{{ $article->body }}</div>
                @if($article->image_path)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $article->image_path) }}"
                             alt="Ảnh minh hoạ"
                             class="max-w-full h-auto rounded">
                    </div>
                @endif
                <div class="text-sm text-gray-500">Tác giả: {{ $article->user->name }} | Ngày tạo:
                    {{ $article->created_at->format('d/m/Y H:i') }}</div>
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}" class="text-blue-500 hover:text-blue-700 mr-2">Sửa</a>
                @endcan
                @can('delete', $article)
                    <form action="{{ route('articles.destroy', $article) }}"
                          method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                    </form>
                @endcan
                @cannot('update', $article)
                    <div class="mt-4 p-4 bg-blue-100 border border-blue-300 rounded">
                        <p class="text-blue-700">Bạn không phải tác giả.</p>
                    </div>
                @endcannot
            </div>
        </div>
    </div>
</x-app-layout>
