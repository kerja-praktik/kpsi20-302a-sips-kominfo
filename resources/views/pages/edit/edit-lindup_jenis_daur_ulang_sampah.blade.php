@extends('layouts.app', ['activePage' => 'edit-lindup_jenis_daur_ulang_sampah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
    @if(session('error'))
            <div class="alert alert-error">
            {{ session('error') }}
            </div>
            @endif

            @if(count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Perhatian !!!</strong>
            <br>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Edit Data') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update60',$tabel60->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type = "hidden" name = "status" value = "Requested">
                        {{method_field('PUT')}}
                                <h6 class="heading-small text-muted mb-4">{{ __('Jenis Daur Ulang Sampah') }}</h6>
                                
                    
                                <input type="hidden" name="id"  value="{{ $tabel60->id }}">
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : 'name' }}">
                                        <label class="form-control-label" for="input-name">
                                            <!-- <i class="w3-xxlarge fa fa-user"></i> -->
                                            {{ __('Kecamatan') }}
                                        </label>
                                        <input type="text" name="kecamatan" id="input-name" class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Kecamatan') }}" value="{{ $tabel60->kecamatan }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'nama_perusahaan'])
                                    </div>
                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-daur_ulang">
                                        {{ __('Daur Ulang') }}</label>
                                        <input type="text" name="daur_ulang" id="input-daur_ulang" class="form-control{{ $errors->has('daur_ulang') ? ' is-invalid' : '' }}" placeholder="{{ __('Daur Ulang') }}" value="{{ $tabel60->daur_ulang }}" required>
        
                                        @include('alerts.feedback', ['field' => 'daur_ulang'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-ton">
                                        {{ __('Ton') }}</label>
                                        <input type="text" name="ton" id="input-ton" class="form-control{{ $errors->has('ton') ? ' is-invalid' : '' }}" placeholder="{{ __('Ton') }}" value="{{ $tabel60->ton }}" required>
        
                                        @include('alerts.feedback', ['field' => 'ton'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produksi">{{ __('Produksi') }}</label>
                                        <input type="text" name="produksi" id="input-produksi" class="form-control{{ $errors->has('produksi') ? ' is-invalid' : '' }}" placeholder="{{ __('Produksi') }}" value="{{ $tabel60->produksi }}" required>
        
                                        @include('alerts.feedback', ['field' => 'produksi'])
                                    </div>

                                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                        <input type="text" name="tahun" id="input-tahun" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}" placeholder="{{ __('Tahun') }}" value="{{ $tabel60->tahun }}" required>
        
                                        @include('alerts.feedback', ['field' => 'tahun'])
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Edit') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            
                        </div>
                    </div>

                   
                </div>
            </div>
        
@endsection                           