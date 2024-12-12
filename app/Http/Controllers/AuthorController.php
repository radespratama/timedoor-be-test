<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostVotedBooks()
    {
        $subQuery = DB::table('ratings')
            ->select('book_id', DB::raw('COUNT(*) as total_voters'))
            ->where('rating', '>', 5)
            ->groupBy('book_id');

        $mostVotedAuthors = Author::select('authors.id', 'authors.name')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->joinSub($subQuery, 'rated_books', 'books.id', '=', 'rated_books.book_id')
            ->selectRaw('SUM(rated_books.total_voters) as total_voters')
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('total_voters')
            ->limit(10)
            ->get();


        return view('most-voted-author', compact('mostVotedAuthors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
