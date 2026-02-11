<h1>{{ $category->title }}</h1>

@foreach($services as $service)
    <p>{{ $service->title }}</p>
@endforeach