@if (!request()->is('table-ordering/*'))
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <span>Powered By Me@l Mentor</span>
                </div>
                <div class="col-md-6 copyright">
                    <a href="{{ url('restaurant/register') }}" style="color: #fff;">Become Mealmentor Partner</a>
                </div>
                <div class="col-md-3 social-media-box">
                    <div>
                        <a href="">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endif
