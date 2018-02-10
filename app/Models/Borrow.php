<?php

namespace Librory\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'user_id',
        'librorian_id',
        'return_date',
        'status',
        'date_returned'
    ];

    protected $dates = [
        'return_date',
        'date_returned'
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
        return $this->hasMany(BorrowedBook::class, 'borrow_id', 'id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'borrowed_books', 'borrow_id', 'book_id');
    }

    /**
     * -------------------------------------------------------------------------
     * Accessor functions
     * -------------------------------------------------------------------------
     */

    public function getBookIdsAttribute()
    {
        if (count($this->books) > 0) {
            return $this->books->pluck('id')->toArray();
        }

        return [];
    }

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function detailsUrl()
    {
        return route('borrow.details', [
            'borrow' => $this->id
        ]);
    }

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

    public function returnUrl()
    {
        return route('borrow.return', [
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

    public function has($book)
    {
        return in_array($book->id, $this->book_ids);
    }

    public function markAsReturned()
    {
        $this->status = 'returned';
        $this->date_returned = Carbon::now();
        $this->save();

        return $this;
    }
}
