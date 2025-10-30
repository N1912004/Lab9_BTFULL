<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; // Add this for the edit method signature

class ArticleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Hiển thị danh sách bài viết
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        $header = 'Quản lý bài viết'; // Define the header for the admin articles page
        return view('articles.index', compact('articles', 'header'));
    }

    /**
     * Form tạo bài viết mới
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }

    /**
     * Lưu bài viết mới
     */
    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', Article::class);
       // Lấy dữ liệu đã validated
    $data = $request->validated();

    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('articles', 'public');
    }

    $data['user_id'] = auth()->id(); // Assign the authenticated user's ID

    Article::create($data);
    return redirect()->route('articles.index')->with('success', 'Tạo bài viết thành công');
    }

    /**
     * Hiển thị chi tiết bài viết
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Form chỉnh sửa bài viết
     */
    public function edit(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Cập nhật bài viết
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);
        $data = $request->validated();

        // Xử lý upload ảnh mới và xóa ảnh cũ nếu có
        if ($request->hasFile('image')) {
            if (!empty($article->image_path) && Storage::disk('public')->exists($article->image_path)) {
                Storage::disk('public')->delete($article->image_path);
            }
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Cập nhật bài viết thành công');
    }

    /**
     * Xóa bài viết
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        // Xóa ảnh nếu có
        if (!empty($article->image_path) && Storage::disk('public')->exists($article->image_path)) {
            Storage::disk('public')->delete($article->image_path);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Xóa bài viết thành công');
    }

}
