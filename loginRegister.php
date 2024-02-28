<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/funcoes.php');?>

<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/khonike/khonike/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:27 GMT -->

<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>

<body>
    
<div id="main-wrapper">
   
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>

    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Entrar ou Cadastrar</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Entrar ou Cadastrar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Login & Register Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 ms-auto me-auto">
                    <?php pr($_POST)?>
                    <ul class="login-register-tab-list nav">
                        <li><a class="active" href="#login-tab" data-bs-toggle="tab">Entrar</a></li>
                        <li>ou</li>
                        <li><a href="#register-tab" data-bs-toggle="tab">Cadastrar</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-12 mb-30"><input type="email" placeholder="Email" required name="email"></div>
                                    <div class="col-12 mb-30"><input type="password" placeholder="Senha" required name="senha"></div>
                                    <div class="col-12 mb-30">
                                        <ul>
                                            <li><input type="checkbox" id="login_remember"  name="lembrar"> <label for="login_remember">Lembrar de mim</label></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 mb-30"><input class="btn" type="submit" value="Entrar"></div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <span>Ainda não possui conta?&nbsp; <a class="register-toggle" href="#register-tab">Cadastre-se!</a></span>
                                        <span><a href="forgot-password.html">Esqueceu a senha ?</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="register-tab" class="tab-pane">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-12 mb-30"><input type="text" placeholder="Nome" required name="nome"></div>
                                    <div class="col-12 mb-30"><input type="text" placeholder="Cpf" required name="cpf"></div>
                                    <div class="col-12 mb-30"><input type="email" placeholder="Email" required name="email"></div>
                                    <div class="col-12 mb-30"><input type="password" placeholder="Senha" required name="senha"></div>
                                    <div class="col-12 mb-30"><input type="password" placeholder="Confirmar Senha" required name="senha"></div>
                                    <div class="col-12 mb-30">
                                        <ul>
                                            <li><input type="checkbox" id="register_agree" name="aceito"><label for="register_agree">Eu aceito os <a href="#">Termos e Condições</a></label></li>
                                        </ul>
                                    </div>
                                    <div class="col-4"><input type="submit" class="btn" value="Cadastrar"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->

     <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/footer.php');?>

</div>
<!-- Placed js at the end of the document so the pages load faster -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/scripts.php');?>
</body>


<!-- Mirrored from htmldemo.net/khonike/khonike/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:27 GMT -->
</html>