@extends('layouts.app')

@section('content')
<h1>Chỉnh sửa bài viết</h1>

<form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Tiêu đề -->
    <div>
        <label>Tiêu đề</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}">
        @error('title')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nội dung -->
    <div>
        <label>Nội dung</label>
        <textarea name="body" rows="6">{{ old('body', $article->body) }}</textarea>
        @error('body')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <!-- Ảnh cũ -->
    <div>
        <label>Ảnh hiện tại</label><br>
        @if(!empty($article->image_path))
            <img src="{{ asset('storage/' . $article->image_path) }}" alt="Ảnh minh họa" style="max-width:300px; margin-bottom:10px;">
        @else
            <p>Chưa có ảnh minh họa</p>
        @endif
    </div>

    <!-- Upload ảnh mới -->
    <div>
        <label>Thay ảnh mới (tùy chọn)</label>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
        @error('image')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Cập nhật</button>
</form>
@endsection
