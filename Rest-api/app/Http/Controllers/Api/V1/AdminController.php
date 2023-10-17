<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Models\AdminModel;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index
    public function index()
    {
        return response()->json(AdminModel::all());
    }
    //View
    public function view($id)
    {
        return response()->json(AdminModel::find($id));
    }
    //login
    public function login($email)
    {
        $data = AdminModel::where('email', $email)->get(['id', 'email', 'pw']);
        if ($data->count() > 0) {
            return response()->json($data);
        } else {
            return response()->json(['Massage' => 'Not Found'], 404);
        }
    }
    //store
    public function store(StoreAdminRequest $request)
    {
        AdminModel::create($request->validated());
        return response()->json("Admin Data Inserted");
    }
    //update
    public function update(StoreAdminRequest $request, $id)
    {
        $data = AdminModel::find($id);
        $data->update($request->validated());
        return response()->json("Admin Data Updated");
    }
    //Delete method
    public function delete($id)
    {
        $user = AdminModel::find($id);
        $user->delete();
        return response()->json("Data Deleted");
    }
}
