@extends('../master')

@section('lib_nav')

	{!! Html::style('lib/snapjs/snap.css') !!}
	{!! Html::script('lib/snapjs/snap.min.js') !!}
	
	{!! Html::style('lib/custom/site/snap_custom.css') !!}
	{!! Html::script('lib/custom/site/snap_custom.js') !!}
	
	{!! Html::style('lib/custom/site/site.css') !!}

@endsection

@section('body')

    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('listListes') }}">Todo</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li {{ Route::currentRouteName() =='listListes' ? 'class=active' : '' }}><a href="{{ route('listListes') }}">Voir mes listes</a></li>
                        @if(sizeof (Auth::user()->listes) > 0)
                            <li {{ Route::currentRouteName() =='listTaches' ? 'class=active dropdown' : 'dropdown' }}>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Voir mes tâches <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach(Auth::user()->listes as $user_liste)
                                        <li {{ Route::currentRouteName() =='listTaches' && empty($current_liste) == false && $user_liste->id == $current_liste->id ? 'class=active' : '' }} >
                                            <a href="{{ route('listTaches', ['id_liste' => $user_liste->id]) }}">{{ $user_liste->nom }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li {{ Route::currentRouteName() =='showAbout' ? 'class=active' : ''}}><a href="{{ route('showAbout')}}">À propos</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#modal-compte-update-password">Changer mon mot de passe</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}">Se déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="container">
        <div class="col-md-12">
            <div class="page-header">
                @yield('header_button')
                <h1>@yield('title')</h1>
            </div>
            @yield('content')
        </div>
    </section>

    {!! Html::modalOpen("modal-compte-update-password","Modification de votre mot de passe") !!}

    {!! Form::open(array('route' => 'updatePassword')) !!}

        <div class="modal-body">

            {!! Form::label('modal-tache-update-old_password', 'Ancien mot de passe') !!}
            {!! Form::password('old_password', array('id'=>'modal-tache-update-old_password','class'=>'form-control','maxlength'=>'60','placeholder'=>'Ancien mot de passe','required'=>'')) !!}

            {!! Form::label('modal-tache-update-new_password', 'Nouveau mot de passe') !!}
            {!! Form::password('new_password', array('id'=>'modal-tache-update-new_password','class'=>'form-control','maxlength'=>'60','placeholder'=>'Nouveau mot de passe','required'=>'')) !!}

            {!! Form::label('modal-tache-update-new_password_confirmation', 'Confirmation du nouveau mot de passe') !!}
            {!! Form::password('new_password_confirmation', array('id'=>'modal-tache-update-new_password_confirmation','class'=>'form-control','maxlength'=>'60','placeholder'=>'Nouveau mot de passe','required'=>'')) !!}

        </div>

        <div class="modal-footer">

            {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
            {!! Form::submit('Sauvegarder', array('class'=>'btn btn-primary')) !!}

        </div>

        {!! Form::close()!!}

    {!! Html::modalClose() !!}

    @yield('modal')

@endsection