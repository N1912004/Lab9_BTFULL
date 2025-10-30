<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Trang chủ
                </a>
                <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Bài viết
                </a>
            </div>
            <div class="flex items-center space-x-4">
    @auth
                <a href="{{ route('articles.create') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Viết bài
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
        @csrf
                    <button type="submit" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium bg-transparent border-none cursor-pointer">
                        Đăng xuất
                    </button>
    </form>
    @endauth

    @guest
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Đăng nhập
                </a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Đăng ký
                </a>
    @endguest
            </div>
        </div>
    </div>
</nav>
