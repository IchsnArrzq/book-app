<?php

namespace App\Services\Member;

use App\Contracts\ServiceContract;
use App\Models\Member;
use App\Services\BaseService;

class MemberDelete extends BaseService implements ServiceContract
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
        Member::find($data['id'])->delete();
        return true;
    }
}
