<?php

namespace App\Services\Book;

use App\Contracts\ServiceContract;
use App\Models\Book;
use App\Services\BaseService;

class BookUpdate extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            'id' => 'required',
            'code' => 'required',
            'title' => 'required',
            'publication_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'writer' => 'required',
            'stock' => 'required|numeric',
        ];
    }
    public function execute(array $data): Book
    {
        $this->validate($data);
        Book::find($data['id'])->update($data);
        return Book::find($data['id']);
    }
}
