<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeadRoleCreateRequest;
use App\Models\HeadRole;
use Illuminate\Http\Request;

class HeadRoleController extends Controller
{
    public function getAll(Request $request) {
        return HeadRole::all();
    }

    public function get(HeadRole $hr) {
        return $hr;
    }

    public function create(HeadRoleCreateRequest $request) {
        $hr = new HeadRole;
        $hr->fill($request->all());
        $hr->save();
    }

    public function delete(HeadRole $hr) {
        $hr->delete();
    }

    public function update(HeadRoleCreateRequest $request, HeadRole $hr) {
        $hr->fill($request->all());
        $hr->save();
    }
}
