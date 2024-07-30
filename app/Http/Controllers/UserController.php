<?php

namespace App\Http\Controllers;
use App\Visitor;
use App\User;
use App\UniqueCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::paginate(10);
      $uniqueCodes = UniqueCode::all();
      return view('admin.user.index', compact('user','uniqueCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.user.create');
    }
    public function regis()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:3|max:100',
        'email' => 'required|email',
        'tipe' => 'required',
        'unique_code' => 'required|exists:unique_codes,code'
        
      ]);
      
      if ($request->input('password')) {
        $password = bcrypt($request->password);
      } else {
          $password = bcrypt('12345678');
      }

      $uniqueCode = UniqueCode::where('code', $request->unique_code)->first();

      if ($uniqueCode->used) {
          return redirect()->back()->withErrors(['unique_code' => 'This code has already been used.']);
      }

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'tipe' => $request->tipe,
        'password' =>$password,
        'activated_until' => $request->tipe == '0' ? null : now()->addDays(30),
      ]);

      $uniqueCode->used = true;
      $uniqueCode->save();

      return redirect()->route('login')->with('success', 'Registration successful.');
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function activate($id)
    {
        $user = User::find($id);
    
        // Tidak melakukan apa-apa jika tipe pengguna adalah '3'
        if ($user->tipe == '3') {
            abort(403, 'Unauthorized action.');
        }
    
        // Aktivasi pengguna jika tipe pengguna bukan '3'
        if ($user->tipe != '0') {
            $user->activated_until = now()->addDays(30);
            $user->save();
        }
    
        return redirect()->route('user.index')->with('success', 'User Berhasil Diaktifkan Kembali');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|min:3|max:100',
        'tipe' => 'required'
      ]);

      if ($request->input('password')) {
        $user_data = [
          'name' => $request->name,
          'tipe' => $request->tipe,
          'password' => Hash::make($request->password)
        ];
      }
      else {
        $user_data = [
          'name' => $request->name,
          'tipe' => $request->tipe,
        ];
      }

      $user = User::find($id);
      $user->update($user_data);

      return redirect()->route('user.index')->with('success', 'User Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();

      return redirect()->back()->with('success', 'USer Berhasil Dihapus');
    }
    public function generateUniqueCode()
    {
        $code = Str::random(10);

        UniqueCode::create([
            'code' => $code,
            'used' => false
        ]);

        return redirect()->back()->with('success', 'Unique code generated successfully.');
    }
    public function deleteUniqueCode($id)
{
    $uniqueCode = UniqueCode::findOrFail($id);
    $uniqueCode->delete();

    return redirect()->back()->with('success', 'Unique code deleted successfully.');
}
}
