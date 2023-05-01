<div>
    <x-slot name="header">
        <livewire:admin.global.pageheader judul="Info" subjudul="Images" :breadcrumb="[ 'Images']" />
    </x-slot>
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" wire:model="images" multiple>
                                    @error('images.*') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div wire:loading wire:target="images">Uploading...</div>
                            @if ($images)
                            @foreach ($images as $images)
                            <img src="{{ $images->temporaryUrl() }}" width="100" class="img-fluid d-block float-left m-2">
                            <div wire:key="{{$loop->index}}">
                                <button type="button" class="btn btn-tool" wire:click="removeMe({{$loop->index}})">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endforeach
                            @else
                            @endif
                            @if ($path)
                            @foreach ($path as $path)
                            <img src="{{ route('helper.show-picture', ['path' => $path]) }}" width="200" height="200" class="img-fluid mx-auto d-block float-left m-2">
                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right" wire:click="simpan">Submit</button>
                </div>
            </div>
        </div>
    </div>