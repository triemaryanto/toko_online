<div>
    @php
    $image = App\Models\Image::where('product_unique_id', $row->unique_id)->get();
    @endphp
    @foreach($image as $item)
    <img src="{{ route('helper.show-picture', ['path' =>  $item['image'] ])}}" width="100" height="100" class="img-fluid mx-auto d-block float-left m-2">
    @endforeach
</div>