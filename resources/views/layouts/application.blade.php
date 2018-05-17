@extends('layouts.skeleton')
@section('bodyClasses', 'bg-gradient-brand text-base text-grey-darkest font-sans relative')

@section('body')
@include('layouts.partials.navigation')
<div class="w-full">
    <div class="container mx-auto py-4">
          <div class="lg:py-2 lg:px-4">
            <div class="flex flex-col h-full mx-2">
              <div class="flex-1 container lg:mx-32 lg:p-4">
                  @yield('content')
              </div>
            </div>
          </div>
      </div>
  </div>
@stop
