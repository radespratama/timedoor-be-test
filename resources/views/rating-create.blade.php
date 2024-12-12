@extends('layout')

@section('content')
<div class="card mt-5" style="max-width: 980px; margin-inline: auto">
    <div class="card-header">
        <h4>Insert Rating</h4>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('rating.create') }}" method="GET">
            <div class="mb-3">
                <label for="authorSelect" class="form-label">Book Author</label>
                <select class="form-select" id="authorSelect" name="author_id" onchange="this.form.submit()" required>
                    <option value="" disabled {{ request('author_id') ? '' : 'selected' }}>Select Author</option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ request('author_id')==$author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if(request('author_id'))
        <form action="{{ route('rating.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bookSelect" class="form-label">Book Name</label>
                <select class="form-select" id="bookSelect" name="book_id" required>
                    <option value="" disabled selected>Select Book</option>
                    @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ratingSelect" class="form-label">Rating</label>
                <select class="form-select" id="ratingSelect" name="rating" required>
                    <option value="" disabled selected>Select Rating</option>
                    @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endif
    </div>
</div>
@endsection
