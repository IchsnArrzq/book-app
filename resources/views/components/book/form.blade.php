<div class="row">
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="code">Code</label>
        <input class="form-control @error('code') is-invalid @enderror" id="code" name="code" type="text"
            aria-describedby="code" value="{{ old('code') ?? $book->code }}">
        @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text"
            aria-describedby="title" value="{{ old('title') ?? $book->title }}">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="publication_year">Publication Year</label>
        <input class="form-control @error('publication_year') is-invalid @enderror" id="publication_year"
            name="publication_year" type="text" aria-describedby="publication_year"
            value="{{ old('publication_year') ?? $book->publication_year }}">
        @error('publication_year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="writer">Writer</label>
        <input class="form-control @error('writer') is-invalid @enderror" id="writer" name="writer" type="text"
            aria-describedby="writer" value="{{ old('writer') ?? $book->writer }}">
        @error('writer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-3">
        <label class="form-label" for="stock">Stock</label>
        <input class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" type="text"
            aria-describedby="stock" value="{{ old('stock') ?? $book->stock }}">
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
