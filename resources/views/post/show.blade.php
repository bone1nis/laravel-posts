@extends("layouts.main")

@section("content")
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">#{{ $post->id }} — {{ $post->title }}</h4>
                <p class="card-text">{{ $post->content }}</p>
                <p class="text-muted">Лайки: {{ $post->likes }}</p>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        ← Назад
                    </a>
                    <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                        ✏️ Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
