<div class="row">
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
            aria-describedby="name" value="{{ old('name') ?? $member->name }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
            aria-describedby="email" value="{{ old('email') ?? $member->email }}" autocomplete="off">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="password">Password</label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
            type="password" aria-describedby="password" value="{{ old('password') }}"
            autocomplete="off">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
