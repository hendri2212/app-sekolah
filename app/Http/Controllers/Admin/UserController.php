<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    private const ROLES = ['superadmin', 'admin', 'operator'];

    public function index(Request $request)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        $users = User::query()
            ->when(!$this->isSuperadmin($request), fn ($query) => $query->where('role', '!=', 'superadmin'))
            ->latest()
            ->paginate(10);

        return view('admin.pengguna.index', compact('users'));
    }

    public function create(Request $request)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        return view('admin.pengguna.create', [
            'roles' => $this->allowedRoles($request),
        ]);
    }

    public function store(Request $request)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        $data = $request->validate($this->rules($request), $this->messages());

        User::create($data);

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function show(Request $request, User $pengguna)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        if ($this->cannotManageSuperadmin($request, $pengguna)) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Akun superadmin hanya dapat dikelola oleh superadmin.');
        }

        return redirect()->route('admin.pengguna.edit', $pengguna);
    }

    public function edit(Request $request, User $pengguna)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        if ($this->cannotManageSuperadmin($request, $pengguna)) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Akun superadmin hanya dapat dikelola oleh superadmin.');
        }

        return view('admin.pengguna.edit', [
            'pengguna' => $pengguna,
            'roles' => $this->allowedRoles($request),
        ]);
    }

    public function update(Request $request, User $pengguna)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        if ($this->cannotManageSuperadmin($request, $pengguna)) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Akun superadmin hanya dapat dikelola oleh superadmin.');
        }

        $data = $request->validate($this->rules($request, $pengguna), $this->messages());

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        $pengguna->update($data);

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(Request $request, User $pengguna)
    {
        if ($response = $this->denyIfCannotAccessUsers($request)) {
            return $response;
        }

        if ($this->cannotManageSuperadmin($request, $pengguna)) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Akun superadmin hanya dapat dikelola oleh superadmin.');
        }

        if ($request->user()->is($pengguna)) {
            return redirect()->route('admin.pengguna.index')->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        $pengguna->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    private function rules(Request $request, ?User $user = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user?->id),
            ],
            'role' => ['required', Rule::in($this->allowedRoles($request))],
            'password' => [
                $user ? 'nullable' : 'required',
                'confirmed',
                Password::min(8),
            ],
        ];
    }

    private function allowedRoles(Request $request): array
    {
        if ($this->isSuperadmin($request)) {
            return self::ROLES;
        }

        return array_values(array_diff(self::ROLES, ['superadmin']));
    }

    private function denyIfCannotAccessUsers(Request $request): ?RedirectResponse
    {
        if (in_array($request->user()?->role, ['superadmin', 'admin'], true)) {
            return null;
        }

        return redirect()->route('admin.dashboard')->with('error', 'Anda tidak memiliki akses ke manajemen pengguna.');
    }

    private function isSuperadmin(Request $request): bool
    {
        return $request->user()?->role === 'superadmin';
    }

    private function cannotManageSuperadmin(Request $request, User $user): bool
    {
        return $user->role === 'superadmin' && !$this->isSuperadmin($request);
    }

    private function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ];
    }
}
