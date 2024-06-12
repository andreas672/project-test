
<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('delete')

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-danger">Delete Account</button>
</form>
