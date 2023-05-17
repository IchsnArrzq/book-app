<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MembersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Services\Member\MemberCreate;
use App\Services\Member\MemberDelete;
use App\Services\Member\MemberUpdate;
use App\Traits\JsonRespond;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    use JsonRespond;
    private $memberCreate;
    private $memberUpdate;
    private $memberDelete;
    public function __construct(MemberCreate $memberCreate, MemberUpdate $memberUpdate, MemberDelete $memberDelete)
    {
        $this->memberCreate = $memberCreate;
        $this->memberUpdate = $memberUpdate;
        $this->memberDelete = $memberDelete;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('admin.members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->memberCreate->execute($request->all());
        return redirect()->route('admin.members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $data = collect([...$request->all(), 'id' => $member->id])->toArray();
        $this->memberUpdate->execute($data);
        return redirect()->route('admin.members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $this->memberDelete->execute(['id' => $member->id]);
        if (request()->ajax()) {
            return $this->respond([
                'message' => 'Successfully removed'
            ]);
        }
        return redirect()->route('admin.members.index');
    }
}
