<?php

namespace App\Services\Member;

use App\Contracts\ServiceContract;
use App\Models\Member;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MemberUpdate extends BaseService implements ServiceContract
{
    public function rules(): array
    {
        return [
            'id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|string|unique:members',
        ];
    }
    public function execute(array $data): Member
    {
        $this->validateUpdate($data);
        if ($data['password'] == '' | null) {
            Member::find($data['id'])->update(collect($data)->only('email', 'name')->toArray());
        } else {
            Member::find($data['id'])->update([...$data, 'password' => Hash::make($data['password'])]);
        }
        return Member::find($data['id']);
    }
    public function validateUpdate(array $data): bool
    {
        if ($data['password'] == '' | null) {
            Validator::make($data, [
                'id' => 'required',
                'name' => 'required|string',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('members')->ignore($data['id'])->where(function ($query) use ($data) {
                        return $query->where('email', $data['email']);
                    })
                ]
            ])->validate();
        } else {
            Validator::make($data, [
                'id' => 'required',
                'name' => 'required|string',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('members')->ignore($data['id'])->where(function ($query) use ($data) {
                        return $query->where('email', $data['email']);
                    })
                ],
                'password' => 'required|string|min:6|max:255',
            ])->validate();
        }
        return true;
    }
}
