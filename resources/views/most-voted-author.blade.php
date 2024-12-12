@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4>
            Top 10 Most Famous Authors
        </h4>
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Author Name</th>
                    <th>Voter</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mostVotedAuthors as $voter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $voter['name'] ?? '-' }}</td>
                    <td>{{ $voter['total_voters'] ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No results found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
