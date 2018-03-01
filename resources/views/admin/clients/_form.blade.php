<input type="hidden" name="client_type" value="{{$client_type}}">
<div class="form-group">
    {{Form::label('name','Nome')}}
    {{Form::text('name',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('document_number','Número Documento')}}
    {{Form::text('document_number',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email','E-mail')}}
    {{Form::email('email',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('phone','Telefone')}}
    {{Form::text('phone',null,['class'=>'form-control'])}}
</div>
@if($client_type==\App\Client::TYPE_INDIVIDUAL)
    @php
        $marital_status= $client->marital_status;
    @endphp
    <div class="form-group">
        {{Form::label('marital_status','Estado Civil')}}
        {{Form::select('marital_status',[
             ' ' =>'Selecione o estado civil',
              1 => 'Solteiro',
              2 => 'Casado',
              3 => 'Divorciado'
        ],null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('date_birth','Data de Nascimento')}}
        {{Form::date('date_birth',null,['class'=>'form-control'])}}
    </div>
    @php
        $sex= $client->sex;
    @endphp
    <div clas="row">
        <label>Sexo</label>
        <div class="form-check">
            <label>
                {{Form::radio('sex','m')}} Masculino</label>
        </div>
        <div class="form-check">
            <label>
                {{Form::radio('sex','f')}} Feminino</label>
        </div>
    </div>
    <br>
    <div class="form-group">
        {{Form::label('physical_disability','Deficiência Fisíca')}}
        {{Form::text('physical_disability',null,['class'=>'form-control'])}}
    </div>
@else
    <div class="form-group">
        {{Form::label('company_name','Nome Fantasia')}}
        {{Form::text('company_name',null,['class'=>'form-control'])}}
    </div>
@endif
<div class="form-check">
    <label>
        {{Form::checkbox('defaulter',1)}} Inadimplente?</label>
</div>
<br>