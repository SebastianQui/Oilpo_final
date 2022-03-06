@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('OILPO') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Te has logeado!') }}
                    <a href="{{ url('admin')}}" class="text-sm text-gray-700 dark:text-gray-500 underline"data-placement="left">Menu</a>

                </div>

            </div>
            <!-- <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th><h1>YO</h1></th>
                                <th><h1>LO QUE VI</h1></th>
                            </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td><img style="width:226px;" src="https://cdn.discordapp.com/attachments/881318396128526336/906214841230954537/252966442_460815902339319_2551551683577914974_n.png" ></td>
                                    <td><img src="https://cdn.discordapp.com/attachments/881318396128526336/911677007656550410/258760872_144132861288437_862885334334383264_n.png"></td>
                                </tr>
                                <tr>
                                <th><h1>MOMENTOS DESPUES...</h1></th>
                                <th><h1>FIN</h1></th>
                                </tr>
                                <tr>
                                    <td><img src="https://cdn.discordapp.com/attachments/881318396128526336/911738052852977664/258393658_125891226520003_438004000173043002_n.png"></td>
                                    <td><img style="width:226px;" src="https://thumbs.gfycat.com/ConcernedDemandingHammerheadbird-max-1mb.gif" alt=""></td>
                                </tr>
                            </tbody>
                    </table>
                    <h3>Un agradecimiento especial a los 'vagos' de:</h3>
                    <p>Santiago</p>
                    <p>Alvaro</p>
                    <p>Carlos</p>
                    <p>Daniel</p> -->
        </div>
    </div>
</div>
@endsection
