@extends('layouts.app')

@section('content')
    @include('cabinet.favorites._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Update</th>
            <th>Title</th>
            <th>Region</th>
            <th>Category
            <th></th>
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($adverts as $advert)
                <tr>
                    <td>{{ $advert->id }}</td>
                    <td>{{ $advert->updated_at }}</td>
                    <td><a href="{{ route('advert.show', $advert) }}" target="_blank">{{ $advert->title }}</a></td>
                    <td>
                        @if($advert->region)
                            {{ $advert->region->name }}
                        @endif
                    </td>
                    <td>{{ $advert->category->name }}</td>
                    <td>
                        <form action="{{ route('cabinet.favorites.remove', $advert) }}" class="mr-1" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><span class="fa fa-remove">Remove</span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $advert->links() }}
@endsection