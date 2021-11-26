@if ($message = Session::get('alert-success'))

    <div class="alert alert-success alert-block text-center">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif 

@if ($message = Session::get('alert-error'))

    <div class="alert alert-danger alert-block text-center">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif 

@if ($message = Session::get('alert-warning'))

    <div class="alert alert-warning alert-block text-center">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif 

@if ($message = Session::get('alert-info'))

    <div class="alert alert-info alert-block text-center text-center">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif 

@if ($errors->any())

    <div class="alert alert-danger text-center alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button> 
        
        <strong> Ocorreram erros, por favor revise o formulário. </strong>        

    </div>

@endif