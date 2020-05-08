<?php

namespace App\Repositories;

use App\Customers;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return $customers = Customers::where('active', 1)
            ->orderBy('name')
            ->with('user')
            ->get()
            ->map->formate();

        // return $customers = Customers::where('active', 1)->orderBy('name')->with('user')->get()
        //     ->map(function ($customer) {
        //         return $customer->formate();
        //     });
    }

    public function findById($customerId)
    {
        return Customers::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->formate();
    }
    public function update($customerId)
    {
        $customer = Customers::where('id', $customerId)->firstOrfail();
        $customer->update(request()->only('name'));
    }
    public function delete($customerId)
    {
        $customer = Customers::where('id', $customerId)->delete();
    }
}
