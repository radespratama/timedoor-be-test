@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <form method="GET" class="row row-cols-lg-auto g-1">
                    <div class="col">
                        <select class="form-select" name="perPage" onchange="this.form.submit()">
                            @foreach($filterList as $filter)
                            <option value="{{ $filter }}" {{ $filter==$paginateTo ? 'selected' : '' }}>
                                {{ $filter }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="q" value="{{ old('q', $search) }}" />
                </form>

                <form method="GET" class="row row-cols-lg-auto g-1">
                    <div class="col">
                        <input class="form-control @error('q') is-invalid @enderror" type="text" name="q"
                            value="{{ old('q', $search) }}" placeholder="Search by title or author..." />
                        @error('q')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">Search</button>
                    </div>

                    <input type="hidden" name="perPage" value="{{ $paginateTo }}" />
                </form>

                <a href="{{ route('most-voted-author') }}" class="btn btn-dark">
                    Top 10 Most Famous Author
                </a>
            </div>

            <div>
                <a href="{{ route('rating.create') }}" class="btn btn-dark">
                    Add Rating
                </a>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Total Voters</th>
                    <th>Average Rating</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book['title'] ?? '-' }}</td>
                    <td>{{ $book['category_name'] ?? '-' }}</td>
                    <td>{{ $book['author_name'] ?? '-' }}</td>
                    <td>{{ $book['total_voters'] ?? 0 }}</td>
                    <td>{{ $book['average_rating'] ?? 0 }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No results found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($books->hasPages())
    <div class="pagination-container mt-3 mx-2">
        {{ $books->appends(['perPage' => $paginateTo, 'q' => $search])->links() }}
    </div>
    @endif
</div>
@endsection
