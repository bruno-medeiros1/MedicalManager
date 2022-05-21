<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use App\Models\User;
use Illuminate\Http\Request;


class ConsultasController extends Controller
{

    public function add_customer_form()
    {
        if( \View::exists('customer.create') ){

            return view('customer.create');

        }
    }

    public function submit_customer_data(Request $request)
    {
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:customers'
        ];

        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];

        $this->validate($request, $rules, $errorMessage);

        Customer::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'email' => strtolower($request->email)
        ]);

        $this->meesage('message','Customer created successfully!');
        return redirect()->back();

    }

    //  ESTA A DAR
    public function fetch_all_customer()
    {
        $consultas = Consultas::toBase()->get();
        return view('consultas.index',compact('consultas'));
    }

    //  ESTA A DAR
    public function edit_customer_form(Consultas $consulta)
    {
        return view('consultas.edit',compact('consulta'));
    }

    //
    public function edit_customer_form_submit(Request $request, Consultas $consulta)
    {
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:customers'
        ];

        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];

        $this->validate($request, $rules, $errorMessage);

        $consulta->update([
            'name' => $request->name,
            'description' => strtolower($request->email)
        ]);

        $this->meesage('message','Customer updated successfully!');
        return redirect()->back();
    }

    public function view_single_customer(Customer $customer)
    {
        return view('customer.view',compact('customer'));
    }

    public function delete_customer(Customer $customer)
    {
        $customer->delete();
        $this->meesage('message','Customer deleted successfully!');
        return redirect()->back();
    }

    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }
}
