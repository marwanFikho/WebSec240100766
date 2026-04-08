<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', optional($user)->name) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', optional($user)->email) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-select" required>
        @php $selectedRole = old('role', optional($user)->role ?? 'customer'); @endphp
        <option value="admin" {{ $selectedRole === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="employee" {{ $selectedRole === 'employee' ? 'selected' : '' }}>Employee</option>
        <option value="customer" {{ $selectedRole === 'customer' ? 'selected' : '' }}>Customer</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Credit</label>
    <input type="number" step="0.01" min="0" name="credit" class="form-control" value="{{ old('credit', optional($user)->credit ?? 0) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Password {{ $user ? '(optional)' : '' }}</label>
    <input type="password" name="password" class="form-control" {{ $user ? '' : 'required' }}>
</div>
<div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" {{ $user ? '' : 'required' }}>
</div>
<button class="btn btn-primary" type="submit">Save</button>
