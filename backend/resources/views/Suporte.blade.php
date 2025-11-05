@extends('layouts.app')

@section('head')
@endsection

@section('content')
  <!-- Conteúdo da página de suporte -->
  <div id="cursor-blur-boxes">
    <div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div><div class="box"></div>
  </div>
  <!-- ...restante do conteúdo da página... -->
@endsection

@section('head')
  <link rel="stylesheet" href="/media/Css/Suporte.css" />
  <link rel="stylesheet" href="/media/Cursor/EfeitoCursor/dist/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script src="/media/Cursor/EfeitoCursor/src/script.js" defer></script>
  <style>
    #cursor-blur-boxes .box {
      position: absolute;
      width: 25px;
      height: 25px;
      top: 50%;
      left: 50%;
      margin: -50 0 0 -50px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      -webkit-backface-visibility: hidden;
      opacity: 0;
      cursor: none;
      transition: box-shadow 0.2s, border 0.2s;
    }
    html[] #cursor-blur-boxes .box {
      background: rgba(255, 255, 255, 0.9);
      border: 2px solid #000;
    }
    html[] #cursor-blur-boxes .box {
      background: rgba(0, 0, 0, 0.9);
      border: 2px solid #fff;
    }
  </style>
@endsection
