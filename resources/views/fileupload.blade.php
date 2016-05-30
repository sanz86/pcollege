<!DOCTYPE html>
<html>
    
    <head>
        <title>Uploader</title>
    </head>
    <body>
        
        {{ $app->client['description'] }}
        
        @if(Session::has('success'))
            {{ Session::get('success') }}
        @endif
        
        <form action="{{ route('upload_file') }}" method="POST" enctype="multipart/form-data" >
            name <input type="text" name="title"/>
            
            file <input id="file" type="file" name="file"/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input type="submit" value="Submit"/>
        </form>
        <!-- jQuery 2.1.4 -->
        <script src="{{ URL('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script>
           (function($) { 
            $.get("http://pcollege-sanz86.c9users.io/content/news", function(data, status){
            console.log(data[0]);
            });
           })(jQuery);
        </script>
        
        
        
    </body>
</html>