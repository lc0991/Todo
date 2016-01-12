@extends('../site/nav')

@section('lib')

	{!! Html::style('lib/custom/site/about/about.css') !!}

@endsection

@section('title')

    À propos

@endsection

@section('content')

    <div class="row">

        <div class="box col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div>
                <h4>Binôme</h4>
                <p>Lucas Monteodorisio</p>
                <p>/</p>
            </div>
        </div>

        <div class="box col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div>
                <h4>Cours</h4>
                <p>Techniques informatiques</p>
            </div>
        </div>

        <div class="box col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div>
                <h4>Dépot Git</h4>
                <p>/</p>
            </div>
        </div>

        <div class="box col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div>
                <h4>Année académique</h4>
                <p>2015-2016</p>
            </div>
        </div>

    </div>

@endsection