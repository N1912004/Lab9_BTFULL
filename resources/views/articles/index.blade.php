@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Quản lý bài viết</h2>
                        @auth
                            <a href="{{ route('articles.create') }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Viết bài
                            </a>
                        @endauth
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($articles->isEmpty())
                        <div class="text-center py-8 text-gray-500">
                            <p class="text-lg">Chưa có bài viết nào.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($articles as $article)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    @if ($article->image_path)
                                        <img src="{{ asset('storage/' . $article->image_path) }}"
                                             alt="{{ $article->title }}"
                                             class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                            <span class="text-gray-400">Không có ảnh</span>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold mb-2">{{ $article->title }}</h3>
                                        <p class="text-sm text-gray-600 mb-3 truncate">{{ Str::limit($article->body, 120) }}</p>
                                        <div class="flex items-center justify-between">
                                            <a href="{{ route('articles.show', $article) }}" class="text-sm text-white bg-blue-500 px-3 py-1 rounded hover:bg-blue-600">Xem</a>
                                            <div class="flex items-center space-x-2">
                                                @can('update', $article)
                                                    <a href="{{ route('articles.edit', $article) }}" class="text-sm text-white bg-yellow-500 px-3 py-1 rounded hover:bg-yellow-600">Sửa</a>
                                                @endcan
                                                @can('delete', $article)
                                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-sm text-white bg-red-500 px-3 py-1 rounded hover:bg-red-600">Xóa</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $articles->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
