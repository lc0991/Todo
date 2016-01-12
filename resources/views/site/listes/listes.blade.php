@extends('../site/nav')

@section('lib')
	
	{!! Html::style('lib/custom/site/listes/listes.css') !!}
	{!! Html::script('lib/custom/site/listes/listes.js') !!}

@endsection

@section('title')

    Mes listes

@endsection

@section('header_button')

    <button type='button' class='btn btn-primary pull-right' data-toggle="modal" data-target="#modal-liste-add">
        <span class="glyphicon glyphicon-plus"></span>
    </button>

@endsection

@section('content')

    <ul class="listes row">

        @foreach(Auth::user()->listes as $user_liste)

            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                {!! Html::panelOpen(null, $user_liste->nom , array('data-toggle'=>'modal','data-target'=>'#modal-liste-update')) !!}

                    <div class="panel-body">

                        <div class="liste-id">{{ $user_liste->id }}</div>
                        <div class="liste-description">{{ $user_liste->description }}</div>

                    </div>

                    <div class="panel-footer">

                        {{ $user_liste->taches->where('etat', '1')->count() }}
                        /
                        {{ $user_liste->taches->count() }}

                    </div>

                {!! Html::panelClose() !!}

            </li>

        @endforeach

    </ul>

@endsection

@section('modal')

    {!! Html::modalOpen("modal-liste-add","Ajouter une liste tâches") !!}

        {!! Form::open(array('route' => 'createListe')) !!}

            <div class="modal-body">

                {!! Form::label('modal-liste-add-nom', 'Nom de la liste de tâches') !!}
                {!! Form::text('nom', null, array('id'=>'modal-liste-add-nom','class'=>'form-control','maxlength'=>'25','placeholder'=>'Nom de la liste de tâches','required'=>'')) !!}

                {!! Form::label('modal-liste-add-description', 'Description de la liste de tâches') !!}
                {!! Form::textarea('description', null, array('id'=>'modal-liste-add-description','class'=>'form-control vresize','maxlength'=>'300','placeholder'=>'Description de la liste de tâches','required'=>'')) !!}

            </div>

            <div class="modal-footer">

                {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
                {!! Form::submit('Ajouter', array('class'=>'btn btn-primary')) !!}

            </div>

    {!! Form::close()!!}

    {!! Html::modalClose() !!}


    {!! Html::modalOpen("modal-liste-update","Mettre à jour une liste de tâches") !!}

        {!! Form::open(array('route' => 'updateListe')) !!}

            <div class="modal-body">

                {!! Form::hidden('id', null, array('id'=>'modal-liste-update-id')) !!}

                {!! Form::label('modal-liste-update-nom', 'Nom de la liste de tâches') !!}
                {!! Form::text('nom', null, array('id'=>'modal-liste-update-nom','class'=>'form-control','maxlength'=>'25','placeholder'=>'Nom de la liste de tâches','required'=>'')) !!}

                {!! Form::label('modal-liste-update-description', 'Description de la liste de tâches') !!}
                {!! Form::textarea('description', null, array('id'=>'modal-liste-update-description','class'=>'form-control vresize','maxlength'=>'300','placeholder'=>'Description de la liste de tâches','required'=>'')) !!}

            </div>

            <div class="modal-footer">

                {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
                {!! Form::submit('Sauvegarder', array('class'=>'btn btn-primary')) !!}
                {!! Form::submit('Supprimer', array('name'=>'remove','class'=>'btn btn-danger pull-left')) !!}

            </div>

        {!! Form::close()!!}

    {!! Html::modalClose() !!}

@endsection