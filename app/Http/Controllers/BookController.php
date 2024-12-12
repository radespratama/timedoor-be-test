<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $books = Book::query()
        //     ->join('categories', 'books.category_id', '=', 'categories.id')
        //     ->join('authors', 'books.author_id', '=', 'authors.id')
        //     ->select([
        //         'books.id',
        //         'books.title',
        //         'categories.name as category_name',
        //         'authors.name as author_name'
        //     ])
        //     ->withCount('ratings as total_voters')
        //     ->withAvg('ratings as average_rating', 'rating')
        //     ->paginate(10);

        $validated = $request->validate([
            'q' => 'nullable|string|max:80',
            'perPage' => 'nullable|integer|in:10,20,30,40,50,60,70,80,90,100',
        ]);

        $search = $validated['q'] ?? '';
        $paginateTo = $validated['perPage'] ?? 10;

        $query = Book::with(['category', 'author', 'ratings'])
            ->select('id', 'title', 'category_id', 'author_id')
            ->withCount('ratings')
            ->withAvg('ratings as average_rating', 'rating');

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('author', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            });
        } else {
            $query->orderByDesc('average_rating');
        }

        $books = $query->paginate($paginateTo);

        $books->getCollection()->transform(function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'category_name' => $book->category->name,
                'author_name' => $book->author->name,
                'total_voters' => $book->ratings_count,
                'average_rating' => number_format($book->average_rating, 2),
            ];
        });

        $filterList = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

        return view('index', compact('books', 'filterList', 'paginateTo', 'search'));
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
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
