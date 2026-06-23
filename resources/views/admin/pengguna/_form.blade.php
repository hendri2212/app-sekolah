@php
    $selectedRole = old('role', $pengguna->role ?? 'operator');
@endphp

<div class="mb-3">
    <label class="form-label fw-semibold">Nama Pengguna</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $pengguna->name ?? '') }}" placeholder="Masukkan nama pengguna..." required>
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $pengguna->email ?? '') }}" placeholder="nama@email.com" required>
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Role</label>
    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
        @foreach($roles as $role)
            <option value="{{ $role }}" {{ $selectedRole === $role ? 'selected' : '' }}>
                {{ ucfirst($role) }}
            </option>
        @endforeach
    </select>
    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
               placeholder="{{ isset($pengguna) ? 'Kosongkan jika tidak diubah' : 'Minimal 8 karakter' }}"
               {{ isset($pengguna) ? '' : 'required' }}>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control"
               placeholder="Ulangi password" {{ isset($pengguna) ? '' : 'required' }}>
    </div>
</div>
