<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'user_id',
        'librorian_id',
        'return_date',
        'status',
    ];

    protected $dates = [
        'return_date'
    ];

    /**
     * -------------------------------------------------------------------------
     * Relationship functions
     * -------------------------------------------------------------------------
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function librorian()
    {
        return $this->belongsTo(User::class, 'librorian_id', 'id');
    }

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'book_id', 'id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'borrowed_books', 'borrow_id', 'book_id');
    }

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function editUrl()
    {
        return route('borrow.edit', [
            'borrow' => $this->id
        ]);
    }

    public function updateUrl()
    {
        return route('borrow.update', [
            'borrow' => $this->id
        ]);
    }

    /**
     * -------------------------------------------------------------------------
     * Unsorted functions
     * -------------------------------------------------------------------------
     */

    public function linkBooks($books)
    {
        if (count($this->borrowedBooks) > 0) {
            $this->borrowedBooks()->delete();
        }

        $books = Book::whereIn('id', $books)->get();

        $data = [];
        foreach ($books as $book) {
            if ($book->total_count == 0) {
                continue;
            }
            array_push($data, [
                'borrow_id' => $this->id,
                'book_id' => $book->id
            ]);
        }

        BorrowedBook::insert($data);
    }
}
