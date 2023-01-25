<?php

namespace App\Repository;

use App\Helpers\HandleData;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $model) {}

    public function create(array $data): User
    {
        return $this->model->create([
            'name' => $data['name'],
            'cpf' => HandleData::onlyNumber($data['cpf']),
            'telephone' => HandleData::onlyNumber($data['telephone']),
            'plate' => $data['plate']
        ]);
    }

    public function find(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function update(User $user, array $data): bool
    {
        return $user->update([
            'name' => $data['name'],
            'cpf' => HandleData::onlyNumber($data['cpf']),
            'telephone' => HandleData::onlyNumber($data['telephone']),
            'plate' => $data['plate']
        ]);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function searchByPlate(string $number): array
    {
        return $this->model::where('plate', 'like', '%'.$number.'%')->paginate(10)->toArray();
    }
}
