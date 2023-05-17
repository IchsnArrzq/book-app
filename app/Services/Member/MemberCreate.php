<?php

namespace App\Services\Member;

use App\Contracts\ServiceContract;
use App\Models\Member;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class MemberCreate extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|string|unique:members',
            'password' => 'required|string|min:6|max:255',
        ];
    }
    public function execute(array $data): Member
    {
        $this->validate($data);
        $member = Member::create([...$data, 'password' => Hash::make($data['password'])],);
        return $member;
    }
}
