<div>
    <!-- Content Header (Page header) -->
    <x-slot name="header">
        <livewire:admin.global.pageheader judul="Info" subjudul="Product" :breadcrumb="[ 'Product']" />
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
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" wire:model.lazy="name" required>
                            @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Harga</label>
                            <input class="form-control" type="number" wire:model.lazy="price" required>
                            @error('price')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input class="form-control" type="number" wire:model.lazy="stock" required>
                            @error('stock')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" type="text" wire:model.lazy="deskripsi" required> </textarea>
                            @error('deskripsi')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/png, image/gif, image/jpeg" wire:model.lazy="image">
                                    <label class="custom-file-label">Choose file</label>
                                    @error('image')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div wire:loading wire:target="image">Uploading...</div>
                                @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="200" class="img-fluid mx-auto d-block float-left m-2">
                                @else

                                @endif
                                @if ($path)
                                <img src="{{ route('helper.show-picture', ['path' => $path]) }}" width="200" height="200" class="img-fluid mx-auto d-block float-left m-2">
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="form-group">
                    @if($isEdit)
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger" wire:click="batal">Batal <i class="icon-cancel-square ml-2"></i></button>
                            <button type="submit" class="btn btn-primary float-right">Update <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                    @else
                    <button type="submit" class="btn btn-primary float-right" wire:click="simpan">Submit</button>
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="card-body">
            <livewire:admin.product-table />
        </div>
        <!-- /.card-body -->
    </div>
</div>