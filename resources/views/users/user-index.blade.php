<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>




    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                  @foreach ($users as $user)
                  <div class="card my-3 p-2">
                    <h4 class="nav-item">{{ $user->name }}</h4>
                    @foreach ($user->posts as $post)
                    <h6>{{ $post->post_title }}</h6>
                    @endforeach
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </section>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
