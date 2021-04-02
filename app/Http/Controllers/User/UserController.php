<?php

namespace App\Http\Controllers\User;


use App\Model\User\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function getUserInfo(Request $request)
    {
        $UserModel = new UserModel();
        $test = $UserModel->getRow('zenglingkai');
        var_dump($test);
//        try {
//            $rule = [
//                'company_id' => 'required|integer',
//                'store_id' => 'required | integer',
//                'veh_group_ids'=>'required | array',
//                'is_system'=>'required',
//                'admin_id'=>'required',
//                'reference'=>'required'
//            ];
//            $this->validate($request, $rule);
//            $company_id = $request->json('company_id');
//            $store_id = $request->json('store_id');
//            $is_system = $request->json('is_system');
//            $admin_id = $request->json('admin_id');
//            $reference = $request->json('reference');
//            $veh_group_ids = $request->json('veh_group_ids');
//
//        } catch (ValidationException $ve) {
//
//        } catch (\Exception $e) {
//
//        }
    }
}
