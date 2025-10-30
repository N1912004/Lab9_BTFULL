@extends('layouts.app')

@section('content')
<h1>Tạo bài viết</h1>
<p><strong>Lưu ý:</strong> Dữ liệu hiện chỉ mô phỏng (chưa lưu DB).</p>

<form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Tiêu đề -->
    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nội dung -->
    <div>
        <label for="body">Nội dung</label>
        <textarea name="body" id="body" rows="6">{{ old('body') }}</textarea>
        @error('body')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <!-- Ảnh minh họa -->
    <div>
        <label for="image">Ảnh minh họa (tùy chọn)</label>
        <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png">
        @error('image')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Lưu</button>
</form>
@endsection
