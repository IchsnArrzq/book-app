<div class="row">
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="book_id">Book</label>
        <select class="form-control @error('book_id') is-invalid @enderror" id="book_id" name="book_id" type="text"
            aria-describedby="book_id" value="{{ old('book_id') }}">
            <option value="{{ $book->id }}" selected>{{ $book->title }} - {{ $book->writer }}</option>
        </select>
        @error('book_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="member_id">Member</label>
        <select class="form-control @error('member_id') is-invalid @enderror" id="member_id" name="member_id"
            type="text" aria-describedby="member_id" value="{{ old('member_id') }}">
            <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
        </select>
        @error('member_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="loan_date">Loan Date</label>
        <input class="form-control @error('loan_date') is-invalid @enderror" id="loan_date" name="loan_date"
            type="date" aria-describedby="loan_date" value="{{ old('loan_date') }}">
        @error('loan_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="return_date">Return Date</label>
        <input class="form-control @error('return_date') is-invalid @enderror" id="return_date" name="return_date"
            type="date" aria-describedby="return_date" value="{{ old('return_date') }}">
        @error('return_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
