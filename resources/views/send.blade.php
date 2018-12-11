@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Отправка сообщения</div>

                    <div class="card-body">
                    <form action="{{route('send')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" value="1" name="id" placeholder="Укажите получателя">
                        <input type="text" name="message">
                        <input type="submit" value="Отправить">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection