@extends("layouts.main")

@section("content")
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Создание поста</h2>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                ← Назад
            </a>
        </div>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input
                    value="{{ old("title") }}"
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    placeholder="Введите заголовок">
                @error("title")
                <p class="text-danger" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea
                    class="form-control"
                    id="content"
                    name="content"
                    rows="4"
                    placeholder="Введите текст поста">{{old("content")}}</textarea>
                @error("content")
                <p class="text-danger" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ссылка на изображение</label>
                <input
                    type="url"
                    class="form-control"
                    id="image"
                    name="image"
                    placeholder="https://example.com/image.jpg"
                    value="{{old("image")}}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{old("category_id") === $category->id ? " selected" : ""}}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Теги</label>
                <select class="form-select" id="tags" name="tags[]" multiple size="5">
                    @foreach($tags as $tag)
                        <option
                            {{ in_array($tag->id, (array) old('tags')) ? 'selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                <div class="form-text">Удерживайте Ctrl (или Cmd ⌘ на Mac), чтобы выбрать несколько</div>
            </div>

            <button type="submit" class="btn btn-primary">💾 Сохранить</button>
        </form>
    </div>
@endsection
