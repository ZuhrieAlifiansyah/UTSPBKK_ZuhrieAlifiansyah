<?php

namespace App\Http\Controllers;

use App\Models\Customers; // Ubah dari Customers ke Customer
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customers::all(); // Ubah dari Customers::all() ke Customer::all()
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'no_pol' => 'required|string|max:10'
        ]);

        $customer = new Customers;
        $customer->nama_customer = $request->input('nama_customer');
        $customer->alamat = $request->input('alamat');
        $customer->jenis_kelamin = $request->input('jenis_kelamin');
        $customer->no_pol = $request->input('no_pol');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = Customers::findOrFail($id); // Ubah dari find ke findOrFail
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id); // Ubah dari find ke findOrFail
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'no_pol' => 'required|string|max:10'
        ]);

        $customer = Customers::findOrFail($id); // Ubah dari find ke findOrFail
        $customer->nama_customer = $request->input('nama_customer');
        $customer->alamat = $request->input('alamat');
        $customer->jenis_kelamin = $request->input('jenis_kelamin');
        $customer->no_pol = $request->input('no_pol');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer updated successfully.');
    }
}

