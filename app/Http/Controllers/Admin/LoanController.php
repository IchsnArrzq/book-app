<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LoansDataTable;
use App\Http\Controllers\Controller;
use App\Services\Loan\LoanUpdateStatus;
use App\Traits\JsonRespond;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    use JsonRespond;
    private $loanUpdateStatus;
    public function __construct(LoanUpdateStatus $loanUpdateStatus)
    {
        $this->loanUpdateStatus = $loanUpdateStatus;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(LoansDataTable $dataTable)
    {
        return $dataTable->render('admin.loans.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->ajax()) {
            $this->loanUpdateStatus->execute([...$request->all(), 'id' => $id]);
            return $this->respond([
                'message' => 'success update loan status',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
