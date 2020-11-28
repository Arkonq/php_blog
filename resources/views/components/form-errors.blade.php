@if($errors->any())

    <ul style="color: tomato; font-size: 80%;">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

@endif
