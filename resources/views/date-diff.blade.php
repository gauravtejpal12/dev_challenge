<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Date Diffrence</title>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
        
        <script>
            function getMessage() {
                var token = $("input[name=_token]").val();
                var from_date = $("input[name=from_date]").val();
                var to_date = $("input[name=to_date]").val();

                $.ajax({
                    type:'POST',
                    url:'api/getmsg',
                    data:{token:token,from_date:from_date,to_date:to_date},
                    success:function(data) 
                    {
                        $("#result").show();
                        $("#msg").html(data.msg);
                        
                    }
                });
            }
        </script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #red;
                color: #2e3336;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                width: 100%;
                align-items: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            button{padding: 3px;}
            code{font-size: 17px;color: red;}
            tt{color: red;}
            .date_field{text-align:center;padding: 12px}
            #result{display: none}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <fieldset>
                    <legend>Day(s) diffrence calculator:</legend>
                        <div class="date_field">
                            From Date : {!! Form::date('from_date', \Carbon\Carbon::now(),['class' => 'form-control', 'required' => 'required']); !!}
                        </div>
                        <div class="date_field">
                                To Date : {!! Form::date('to_date', \Carbon\Carbon::now(),['class' => 'form-control', 'required' => 'required']); !!} 
                        </div>
                        <div class="date_field">
                        <?php
                            echo Form::button('Calculate',['onClick'=>'getMessage()']);
                        ?>
                        </div>
                </fieldset>
            </div>
            <br />
            <div class="content" id="result">
                <fieldset>
                    <legend>Result:</legend>
                        <div class="result_Set" id = 'msg'>Please click 'Calculate' button to perform.</div>
                </fieldset>
            </div>
        </div>
    </body>
</html>
