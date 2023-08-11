@foreach($tin as $value)
    {{$value->name}}<br>
@endforeach
{!! $tin->links() !!}

<style>
    svg {
        display: none;
    }

</style>
