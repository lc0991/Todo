@extends('../site/nav')

@section('lib')

	{!! Html::style('lib/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') !!}
	{!! Html::script('lib/bootstrap_datetimepicker/bootstrap-datetimepicker.min.js') !!}
	{!! Html::script('lib/bootstrap_datetimepicker/bootstrap-datetimepicker.fr.js') !!}
	
	{!! Html::script('lib/custom/site/taches/datetimepicker_custom.js') !!}
	
	{!! Html::style('lib/custom/site/taches/taches.css') !!}
	{!! Html::script('lib/custom/site/taches/taches.js') !!}

@endsection

@section('title')

    {{ $current_liste->nom }}

@endsection

@section('header_button')

    <button type='button' class='btn btn-primary pull-right' data-toggle="modal" data-target="#modal-tache-add">
        <span class="glyphicon glyphicon-plus"></span>
    </button>

@endsection

@section('content')

    <ul class="taches">
        @foreach($current_liste->taches as $tache)
            @if($tache->etat==1)
                <li class="complete">
            @else
                <li>
            @endif
                    <div class="tache-modal row" data-toggle="modal" data-target="#modal-tache-update">
                        <div class="tache-id hidden">{{$tache->id}}</div>
                        <div class="tache-priorite hidden">{{$tache->priorite}}</div>
                        <div class="tache-etat hidden">{{$tache->etat}}</div>
                        <div class="tache-nom col-xs-12 col-sm-9 col-md-9 col-lg-9">{{$tache->nom}}</div>
                        <div class="tache-echeance col-xs-12 col-sm-3 col-md-3 col-lg-3 datetimepicker-fr-convert">{{$tache->echeance}}</div>
                    </div>
                </li>
        @endforeach
    </ul>

@endsection

@section('modal')

    {!! Html::modalOpen("modal-tache-add","Ajouter une tâche") !!}

        {!! Form::open(array('route' => 'createTache')) !!}

            <div class="modal-body">

                {!! Form::hidden('id_liste', $current_liste->id, array('id'=>'modal-tache-update-id_liste')) !!}

                {!! Form::label('modal-tache-add-nom', 'Nom de la tâche') !!}
                {!! Form::text('nom', null, array('id'=>'modal-tache-add-nom','class'=>'form-control','maxlength'=>'35','placeholder'=>'Nom de la tâche','required'=>'')) !!}

                {!! Form::label('modal-tache-add-priorite', 'Priorité de la tâche') !!}
                {!! Form::spinner('priorite', 100, array('id'=>'modal-tache-add-priorite','class'=>'form-control','maxlength'=>'3','step'=>'10','max'=>'100','min'=>'0','placeholder'=>'Priorité de la tâche','required'=>'')) !!}

                {!! Form::hidden('etat', 0, array('id'=>'modal-tache-add-etat')) !!}

                {!! Form::label('modal-tache-add-echeance', 'Échéance de la tâche') !!}
                {!! Form::text('echeance', null, array('id'=>'modal-tache-add-echeance','class'=>'form-control datetimepicker-fr datetimepicker-fr-autodate','maxlength'=>'16','placeholder'=>'Date de l\'échance de la tâche','required'=>'')) !!}

             </div>

             <div class="modal-footer">

                 {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
                 {!! Form::submit('Ajouter', array('class'=>'btn btn-primary')) !!}

            </div>

        {!! Form::close()!!}

    {!! Html::modalClose() !!}


    {!! Html::modalOpen("modal-tache-update","Modifier une tâche") !!}

        {!! Form::open(array('route' => 'updateTache')) !!}

            <div class="modal-body">

                {!! Form::hidden('id', null, array('id'=>'modal-tache-update-id')) !!}

                {!! Form::label('modal-tache-update-nom', 'Nom de la tâche') !!}
                {!! Form::text('nom', null, array('id'=>'modal-tache-update-nom','class'=>'form-control','maxlength'=>'35','placeholder'=>'Nom de la tâche','required'=>'')) !!}

                {!! Form::label('modal-tache-update-priorite', 'Priorité de la tâche') !!}
                {!! Form::spinner('priorite', 100, array('id'=>'modal-tache-update-priorite','class'=>'form-control','maxlength'=>'3','step'=>'10','max'=>'100','min'=>'0','placeholder'=>'Priorité de la tâche','required'=>'')) !!}

                {!! Form::label('modal-tache-update-etat', 'État de la tâche') !!}
                {!! Form::select('etat', array('0' => 'À faire', '1' => 'Terminée'),'0', array('id'=>'modal-tache-update-etat','class'=>'form-control','required'=>'')) !!}

                {!! Form::label('modal-tache-update-echeance', 'Échéance de la tâche') !!}
                {!! Form::text('echeance', null, array('id'=>'modal-tache-update-echeance','class'=>'form-control datetimepicker-fr','maxlength'=>'16','placeholder'=>'Date de l\'échance de la tâche','required'=>'')) !!}

            </div>

            <div class="modal-footer">

                {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
                {!! Form::submit('Sauvegarder', array('class'=>'btn btn-primary')) !!}
                {!! Form::submit('Supprimer', array('name'=>'remove','class'=>'btn btn-danger pull-left')) !!}

            </div>

        {!! Form::close()!!}

    {!! Html::modalClose() !!}

@endsection