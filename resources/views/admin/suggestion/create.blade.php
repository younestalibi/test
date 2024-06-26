@extends('layouts.container')

@section('title')
Create Suggestion
@endsection


@section('m-content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1">
        <div class="row">
            <div class="col-md-12">
                <!-- Create Suggestion -->
                <div class="card">
                    <h5 class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.suggestion.index') }}" class="btn btn-info">
                                <span class="tf-icons fa-solid fa-angles-left"></span> &nbsp; Back
                            </a>
                        </div>
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.suggestion.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="name">City</label>
                                    <select class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                        @foreach (\App\Models\Service::POPULAR_CITIES as $key => $value)
                                            <option {{ old('name') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label class="form-label" for="description">Description of Suggestion</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description of suggestion" style="max-height:120px; height: 100px">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-start align-items-center gap-4">
                                    <div class="col-5">
                                        <img src="{{ asset('users/default.png') }}" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar" />
                                    </div>
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-warning me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="image" class="account-file-input @error('image') is-invalid @enderror" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K.</p>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-info">
                                        <span class="tf-icons bx bxs-save"></span> &nbsp; Store
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Create Suggestion -->
            </div>
        </div>
    </div>
    <!-- / Content -->

</div>
<!-- Content wrapper -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@if (session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif

@if (session('error'))
<script>
    toastr.error("{{ session('error') }}");
</script>
@endif
@endsection
