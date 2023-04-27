<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{ $judul }}</span> -
                {{ $subjudul }}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active"> @foreach($breadcrumb ?? [] as $breadcrumb)
                    <span class="breadcrumb-item"><i class=""></i> {{ $breadcrumb }}</span>
                    @endforeach
                </li>
            </ol>
        </div>
    </div>
</div>