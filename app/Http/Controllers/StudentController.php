<?php


namespace App\Http\Controllers;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->latest()->paginate(10);
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'roll_number'       => 'required|numeric|unique:students',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profile = 'avatar.png';
        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        }
        $user->update(['profile_picture' => $profile]);

        $user->student()->create([
            'roll_number'     => $request->roll_number,
            'gender'          => $request->gender,
            'phone'           => $request->phone,
            'dateofbirth'     => $request->dateofbirth,
            'current_address' => $request->current_address,
        ]);

        $user->assignRole('Student');

        return redirect()->route('student.index');
    }

    public function show($id)
    {
        $student = Student::with(['user'])->findOrFail($id);
        return view('backend.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('backend.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255|unique:users,email,' . $student->user_id,
            'roll_number'     => 'required|numeric|unique:students,roll_number,' . $student->id,
            'gender'          => 'required|string',
            'phone'           => 'required|string|max:255',
            'dateofbirth'     => 'required|date',
            'current_address' => 'required|string|max:255',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($student->user->name) . '-' . $student->user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $student->user->profile_picture;
        }

        $student->user()->update([
            'name'            => $request->name,
            'email'           => $request->email,
            'profile_picture' => $profile,
        ]);

        $student->update([
            'roll_number'     => $request->roll_number,
            'gender'          => $request->gender,
            'phone'           => $request->phone,
            'dateofbirth'     => $request->dateofbirth,
            'current_address' => $request->current_address,
        ]);

        return redirect()->route('student.index');
    }

    public function destroy(Student $student)
    {
        $user = $student->user;

        $student->delete();
        $user->removeRole('Student');

        if ($user->profile_picture !== 'avatar.png') {
            $imagePath = public_path("images/profile/{$user->profile_picture}");
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }

        $user->delete();

        return redirect()->back()->with('success', 'Étudiant supprimé avec succès.');
    }
}


