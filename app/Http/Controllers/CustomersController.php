<?php

namespace App\Http\Controllers;


use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CustomersController extends Controller
{
    //
    private $customerRepository;

    //
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cache::flush();
        $customers = $this->customerRepository->all();
        //$customers = Customers::where('active', 1)->orderBy('name')->with('user')->get();
        return $customers;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        return $customers = $this->customerRepository->findById($customerId);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update($customersId)
    {
        $this->customerRepository->update($customersId);
        return redirect('/customers/' . $customersId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($customersId)
    {
        $this->customerRepository->delete($customersId);
        return redirect('/customers/');
    }
}
