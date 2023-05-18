<?php

namespace App\Services\Book;

use App\Contracts\ServiceContract;
use App\Models\Book;
use App\Services\BaseService;

class BookUpdateStock extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            'id' => 'required',
            'status' => 'required'
        ];
    }
    public function execute(array $data): Book
    {
        $this->validate($data);

        $book = Book::find($data['id']);

        switch ($data['status']) {
            case 'down':
                $book->stock = $book->stock - 1;
                break;
            case 'net':
                $book->stock = $book->stock;
                break;
            case 'up':
                $book->stock = $book->stock + 1;
                break;
        }

        $book->save();
        return $book;
    }
}
