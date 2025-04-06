@extends("layouts.main")

@section("content")
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Список постов</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success">
                ➕ Создать пост
            </a>
        </div>

        @forelse($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                            {{ $post->title }}
                        </a>
                    </h5>
                    <p class="card-text">Категория: {{ optional($post->category)->name ?? 'Неизвестно' }}</p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">❤️ Лайков: {{ $post->likes }}</span>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary btn-sm">
                            Подробнее →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">Постов пока нет.</div>
        @endforelse
    </div>
@endsection
