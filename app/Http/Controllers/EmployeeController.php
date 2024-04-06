<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\View\View;




class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all(); // Récupérer tous les employés

        // Passer les données à la vue 'gestion_employee'
        return view('employee.gestion_employee')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request): RedirectResponse
    {


        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:9'],
            'sexe' => ['required', 'string'],
            'city' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Employee::class],
            'date_of_birth' => ['required'],
        ]);
        $phone = '+212' . $request->phone;


        $Employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $phone,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'date_of_birth' => $request->date_of_birth,
            'user_id' => auth()->id()
        ]);



        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', [
            'employee' => Employee::findorFail($employee)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($employee)
    {
        $employee = Employee::findOrFail($employee);


        $moroccanCities = [
            'Casablanca', 'Rabat', 'Marrakech', 'Tanger', 'Fès', 'Agadir', 'Essaouira', 'Tétouan', 'Meknès', 'Oujda', 'Chefchaouen', 'El Jadida', 'Taza', 'Taroudant', 'Ouarzazate', 'Kenitra', 'Nador', 'Laâyoune', 'Safi', 'Khémisset', 'Béni Mellal', 'Témara', 'Mohammedia', 'Khouribga', 'Berrechid', 'Taourirt', 'Oued Zem', 'Fquih Ben Salah', 'Dakhla', 'Sidi Slimane',
        ];


        return view('employee.edit_employee', [
            'employee' => $employee,
            'moroccanCities' => $moroccanCities,
        ]);
    }
  

    public function update(Request $request, $employee)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string' ],
            'sexe' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        $employee = Employee::find($employee);

        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employé non trouvé.');
        }

        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'role'=>$request->input('role'),
            'sexe' => $request->input('sexe'),
            'email' => $request->input('email'),
            'city' => $request->input('city')



        ]);

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function add_employee()
    {

        $moroccanCities = [
            'Casablanca', 'Rabat', 'Marrakech', 'Tanger', 'Fès', 'Agadir', 'Essaouira', 'Tétouan', 'Meknès', 'Oujda', 'Chefchaouen', 'El Jadida', 'Taza', 'Taroudant', 'Ouarzazate', 'Kenitra', 'Nador', 'Laâyoune', 'Safi', 'Khémisset', 'Béni Mellal', 'Témara', 'Mohammedia', 'Khouribga', 'Berrechid', 'Taourirt', 'Oued Zem', 'Fquih Ben Salah', 'Dakhla', 'Sidi Slimane',
        ];



        return view('employee.add_employee', [
            'moroccanCities' => $moroccanCities,
        ]);
    }


    public function deleteMultiple(Request $request)
    {
        $selectedEmployees = $request->ids;

        Employee::whereIn('id', $selectedEmployees)->delete();
        return redirect()->route('employees.index');
    }

    public function showLoginForm()
    {
        return view('employee.login-employee');
    }

    // Gérer le processus de connexion des employés
 
    public function login(LoginRequest $request)
    {
        $request->authenticateEmployee();

        $request->session()->regenerate();
        return redirect()->intended('/');

    }
    



    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    
    }

    public function Edit_V($employe){
        $employee = Employee::findOrFail($employe);
    
        $moroccanCities = [
           'El Kelaa Des Sraghna', 'Casablanca', 'Rabat', 'Marrakech', 'Tanger', 'Fès', 'Agadir', 'Essaouira', 'Tétouan', 'Meknès', 'Oujda', 'Chefchaouen', 'El Jadida', 'Taza', 'Taroudant', 'Ouarzazate', 'Kenitra', 'Nador', 'Laâyoune', 'Safi', 'Khémisset', 'Béni Mellal', 'Témara', 'Mohammedia', 'Khouribga', 'Berrechid', 'Taourirt', 'Oued Zem', 'Fquih Ben Salah', 'Dakhla', 'Sidi Slimane',
        ];
    
        return view('employee.edit-employee', [
            'employee' => $employee,
            'moroccanCities' => $moroccanCities,
        ]);
    }
   public function registerCondidat(){
    return view("employee.register_condidat");
   }

   public function store_condidat(Request $request): RedirectResponse
   {


       $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
           'last_name' => ['required', 'string', 'max:255'],
           'phone' => ['required', 'string', 'max:9'],
           'sexe' => ['required', 'string'],
           'city' => ['required'],
           'password' => ['required', Rules\Password::defaults()],
           'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Employee::class],
           'date_of_birth' => ['required'],
       ]);
       $phone = '+212' . $request->phone;
        $role='condidat';
       $Employee = Employee::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'phone' => $phone,
           'sexe' => $request->sexe,
           'email' => $request->email,
           'role'=> $role,
           'password' => Hash::make($request->password),
           'city' => $request->city,
           'date_of_birth' => $request->date_of_birth,
           'user_id' => auth()->id()
       ]);



       return redirect()->route('employee.login');
   }
 

}
