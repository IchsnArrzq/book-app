<?php

namespace App\Services\Book;

use App\Contracts\ServiceContract;
use App\Models\Book;
use App\Services\BaseService;

class BookDelete extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            'id' => 'required',
        ];
    }
    public function execute(array $data): bool
    {
        $this->validate($data);
        Book::find($data['id'])->delete();
        return true;
    }
}
