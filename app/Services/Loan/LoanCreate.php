<?php

namespace App\Services\Loan;

use App\Contracts\ServiceContract;
use App\Models\Loan;
use App\Services\BaseService;

class LoanCreate extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            "book_id" => "required|exists:books,id",
            "member_id" => "required|exists:members,id",
            "loan_date" => 'required|date|after_or_equal:today',
            "return_date" => 'required|date|after_or_equal:loan_date',
        ];
    }
    public function execute(array $data): Loan
    {
        $this->validate($data);
        $loan = Loan::create($data);
        return $loan;
    }
}
