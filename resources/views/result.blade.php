@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Test 2 Code: Solved with javascript</div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-md-12">
                        
                        <xmp style="margin-left: -120px">
                        var test = ["{({[]})}", "[(])]", "({[()]})", "])", "{[]}"];
                        function verify(test){
                        var result = [];
                        test.forEach(function(item, idx){
                        var opening = ["[", "(" , "{"];
                        var closing = ["]", ")", "}"];
                        var openingStack = [];
                        var len = item.length;
                        var verdict = null;
                        for(var i = 0; i<len; i++){
                        if(opening.indexOf(item[i]) != -1){
                        openingStack.push(item[i]);
                        }
                        else if(i == 0){
                        verdict = "No";
                        break;
                        }
                        else{
                        if(opening.indexOf(openingStack.pop()) != closing.indexOf(item[i])){
                        verdict = "No";
                        break;
                        }
                        }
                        }
                        verdict = verdict ? "No" : "Yes";
                        result.push(verdict);
                        })
                        return result;
                        }
                        console.log(verify(test)); // prints the result
                    </xmp>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection