@extends('layouts.base')
@section('content')

<hr>
<p align="right"><label class="label label-success">Página {{$posts->getCurrentPage()}} de {{$posts->getTotal()}}</label></p>
<hr>
        
    @if($posts->getTotal()>0)
    <?php
    $cont = 0;
        foreach ($posts as $post) {
            if($cont==0){
            ?>
                <div class="row">
                <?php } ?>
                    <div class="col-sm-6 col-sm-4">
                        <div class="thumbnail">
                          
                            // Codigo de Imagen aca!
                                             
                     
                            <div class="caption">
                                <h3>{{ $post->content }}</h3>
                                <p>{{ $post->title }}</p><br>
                            </div>
                        </div>
                    </div>
                <?php
                    if($cont==2){
                    $cont = -1;
                ?>
                </div>
                <?php
                }
                    $cont++;
                }
                if($cont<2){
                ?>
            <?php } ?>

            <div class="container">
                <div class="row" align="center">
                    <div class="col-md-12">
                        {{ $posts->appends(array("buscar" => Input::get("buscar")))->links() }}    
                    </div>
                </div>
            </div>
@else
    <div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>No se encontraron resultados.</strong>
    </div>
@endif
@stop