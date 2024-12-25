@extends('backend.masterbackend')
@section ('content')
<div class="container">
    <h1>Create Post</h1>
    <form  method="POST">
        @csrf

        <!-- Author ID -->
        <div class="mb-3">
            <label for="authorId" class="form-label">Author</label>
            <select name="authorId" id="authorId" class="form-control">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Parent ID -->
        <div class="mb-3">
            <label for="parentId" class="form-label">Parent Post (Optional)</label>
            <select name="parentId" id="parentId" class="form-control">
                <option value="">None</option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <!-- Meta Title -->
        <div class="mb-3">
            <label for="metaTitle" class="form-label">Meta Title (Optional)</label>
            <input type="text" name="metaTitle" id="metaTitle" class="form-control">
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>

        <!-- Summary -->
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" id="summary" class="form-control"></textarea>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>

        <!-- Published -->
        <div class="mb-3 form-check">
            <input type="checkbox" name="published" id="published" class="form-check-input">
            <label for="published" class="form-check-label">Published</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

@endsection

