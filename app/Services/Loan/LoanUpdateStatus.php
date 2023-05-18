<?php

namespace App\Services\Loan;

use App\Contracts\ServiceContract;
use App\Models\Loan;
use App\Services\BaseService;
use App\Services\Book\BookUpdateStock;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class LoanUpdateStatus extends BaseService implements ServiceContract
{
    private $bookUpdateStock;
    private const WAITING_APPROVAL = 0;
    private const APPROVE = 1;
    private const REJECT = 2;
    private const DONE = 3;

    public function __construct(BookUpdateStock $bookUpdateStock)
    {
        $this->bookUpdateStock = $bookUpdateStock;
    }
    public function rules(): array
    {
        return [
            "id" => "required|exists:loans,id",
            'status' => 'required',
        ];
    }
    public function execute(array $data): bool
    {
        $this->validate($data);

        $loan = Loan::find($data['id']);

        $statusBefore = $loan->status;
        $statusAfter = $data['status'];

        if ($statusBefore == $this::WAITING_APPROVAL and $statusAfter == $this::APPROVE) {
            if ($loan->book->stock == 0) {
                throw new UnprocessableEntityHttpException('book stock is running out');
            }
            $this->bookUpdateStock->execute([
                'id' => $loan->book_id,
                'status' => 'down',
            ]);
            $loan->status = $data['status'];
            $loan->save();
            return true;
        }
        if ($statusBefore == $this::WAITING_APPROVAL and $statusAfter == $this::REJECT) {
            $this->bookUpdateStock->execute([
                'id' => $loan->book_id,
                'status' => 'net',
            ]);
            $loan->status = $data['status'];
            $loan->save();
            return true;
        }
        if ($statusBefore == $this::APPROVE and $statusAfter == $this::DONE) {
            $this->bookUpdateStock->execute([
                'id' => $loan->book_id,
                'status' => 'up',
            ]);
            $loan->status = $data['status'];
            $loan->save();
            return true;
        }
        throw new UnprocessableEntityHttpException('flow is not accepted');
    }
}
