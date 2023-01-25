<?php

namespace App\Http\Controllers;

use App\Helpers\StatusReturn;
use App\Http\Requests\{UserCreateRequest, UserUpdateRequest};
use App\Services\UserService;
use Exception;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function create(UserCreateRequest $request)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->create($request->all())],
                    ['status' => StatusReturn::CREATED]
                ),
                StatusReturn::CREATED
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }

    public function show($id)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->find($id)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->update($request->all(), $id)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }


    public function delete($id)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->destroy($id)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }

    public function searchByPlate($number)
    {
        try {
            return response(
                array_merge(
                    ['data' => $this->service->searchByPlate($number)],
                    ['status' => StatusReturn::SUCCESS]
                ),
                StatusReturn::SUCCESS
            );
        } catch (Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }
    }
}
