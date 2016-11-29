@section('styles')
    <link rel="stylesheet" href="{{ URL::to('src/css/common.css') }}" type="text/css" />
@append

@if(Session::has('fail'))
    <section>
        <div class="info-box fail">
        {{ Session::get('fail') }}
        </div>
    </section>
@endif

@if(Session::has('success'))
    <section>
        <div class="info-box success">
        {{ Session::get('success') }}
        </div>
    </section>
@endif

@if(count('$errors') > 0)
    @foreach($errors->all() as $error)
    <section>
        <article class="alert alert-danger">
            {{ $error }}
        </article>
    </section>
    @endforeach
@endif