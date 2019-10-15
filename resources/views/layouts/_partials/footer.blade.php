<footer>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border py-3">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <span class="nav-link">Ikuti kami di :</span>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mr-1 fab fa-facebook"></i>
                        {{ __('Facebook') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mr-1 fab fa-twitter"></i>
                        {{ __('Twitter') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mr-1 fab fa-google-plus"></i>
                        {{ __('Google Plus') }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-3">
        <h4>{{ config('app.name') }}</h4>
        <p>Copyright &copy; {{ date('Y') }}, {{ config('app.name') }}</p>
    </div>
</footer>

<script src="/js/jquery/jquery.min.js"></script>
<script src="/js/popper.js/popper.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script>
    $('#image').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</body>

</html>
