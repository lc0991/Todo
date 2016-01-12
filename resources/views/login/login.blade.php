@extends('../master')

@section('lib')

	{!! Html::style('lib/custom/login/login.css') !!}

@endsection

@section('title')

    Todo - Connexion

@endsection

@section('body')

    <div class="container">

        <div class="content">

            {!! Form::open(array('route' => 'login')) !!}

                <h1>Todo</h1>

                {!! Form::label('login-email', 'Email') !!}
                {!! Form::email('email', null, array('id'=>'login-email','class'=>'form-control','maxlength'=>'255','placeholder'=>'Email','required'=>'','autofocus'=>'')) !!}

                {!! Form::label('login-password', 'Mot de passe') !!}
                {!! Form::password('password', array('id'=>'login-password','class'=>'form-control','maxlength'=>'60','placeholder'=>'Mot de passe','required'=>'')) !!}

                {!! Form::checkboxInsert('remember','login-remember','Se souvenir de moi') !!}

                {!! Form::submit('Se connecter', array('class'=>'btn btn-primary btn-lg btn-block')) !!}

                {!! Form::button('Inscription', array('id'=>'btn-user-add','class'=>'btn btn-default btn-xs pull-right','data-toggle'=>'modal','data-target'=>'#modal-user-add')) !!}

            {!! Form::close()!!}

        </div>

    </div>

    {!! Html::modalOpen("modal-user-add","Inscription") !!}

        {!! Form::open(array('route' => 'register')) !!}

            <div class="modal-body">

                {!! Form::label('modal-user-add-name', 'Votre nom :') !!}
                {!! Form::text('name', null, array('id'=>'modal-user-add-name','class'=>'form-control','maxlength'=>'255','placeholder'=>'Nom','required'=>'')) !!}

                {!! Form::label('modal-user-add-email', 'Votre email :') !!}
                {!! Form::email('email', null, array('id'=>'modal-user-add-email','class'=>'form-control','maxlength'=>'255','placeholder'=>'Email','required'=>'')) !!}

                {!! Form::label('modal-user-add-password', 'Votre mot de passe :') !!}
                {!! Form::password('password', array('id'=>'modal-user-add-password','class'=>'form-control','maxlength'=>'60','placeholder'=>'Mot de passe','required'=>'')) !!}

                {!! Form::label('modal-user-add-password_confirmation', 'Confirmation de votre mot de passe :') !!}
                {!! Form::password('password_confirmation', array('id'=>'modal-user-add-password_confirmation','class'=>'form-control','maxlength'=>'60','placeholder'=>'Mot de passe','required'=>'')) !!}

                {!! app('captcha')->display() !!}

            </div>

            <div class="modal-footer">

                {!! Form::button('Annuler', array('class'=>'btn btn-default','data-dismiss'=>'modal')) !!}
                {!! Form::submit('S\'inscrire', array('class'=>'btn btn-primary')) !!}

            </div>

        {!! Form::close()!!}

    {!! Html::modalClose() !!}

@endsection