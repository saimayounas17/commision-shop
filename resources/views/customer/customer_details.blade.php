@extends('body.main')
    @section('dashboard')
<br>
        <div id="app">
            <customerdetails-view></customerdetails-view>

        </div>


    @endsection
    <style>

.noprint {
                visibility: hidden;
            }
        @media print {
            .noprint {
                  visibility: hidden;
               }
        }
    </style>
