@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active'
            : 'pasactive';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

<style>
    .active{
        display: flex;
        align-items: center;
        flex-direction: column;
        color: gray;
        opacity: 0.5;
        text-decoration: none;
       padding: 20px;



    }


    a:hover{
        color: cadetblue;

    }
    .pasactive{
        padding: 20px;
        display: flex;
        align-items: center;
        flex-direction: column;
        color:gray;
        text-decoration: none


    }
</style>
