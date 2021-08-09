@if ($errors->any())
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
@if(session('success'))
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
@if(session('status'))
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
            <p>{{ session('status') }}</p>
        </div>
    </div>
@endif