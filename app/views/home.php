<?php 

use App\Library\Session;

echo $this->loadView("comuns/cabecalho");
echo $this->loadView("comuns/menu");

?>

<main class="site-main">

    <section class="blog_area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a class="active"  href="#">Esporte</a>
                                    </div>
                                    <ul class="blog_meta list">

                                        <li>
                                            <a href="#">Marcar como lida
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>

                                        </li>

                                        <li>
                                            <a href="#">1 Agosto, 2021
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1.2M Visualizações
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">06 Comentários
                                                <i class="fa fa-comments" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="<?= SITEURL ?>assets/img/blog/m-blog-ciclismo-de-estrada.png" alt="">
                                    <div class="blog_details">
                                        <a href="index.php?view=noticia-detalhe">
                                            <h2>Olimpíadas: No ciclismo de estrada, Equador conquista 2ª medalha de sua história nos Jogos Olímpicos</h2>
                                        </a>
                                        <p>
                                            Richard Carapaz fez história na manhã deste sábado! O equatoriano venceu o ciclismo de 
                                            estrada das Olimpíadas de Tóquio e conquistou a segunda medalha de ouro da história do 
                                            país nos Jogos Olímpicos. Carapaz teve um tempo de 6:05:26 para completar os 234 
                                            quilômetros da prova... 
                                        </p>
                                        <a href="index.php?view=noticia-detalhe" class="button button-blog">Veja mais</a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a class="active" href="#">Tecnologia,</a>
                                        <a class="active" href="#">Legislação</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li>
                                            <a href="#">Marcar como lida
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1 Agosto, 2021
                                                <i class="lnr lnr-calendar-full"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1.2M Visualizações
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">06 Comentários
                                                <i class="lnr lnr-bubble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="<?= SITEURL ?>assets/img/blog/m-blog-lgpd.png" alt="">
                                    <div class="blog_details">
                                        <a href="index.php?view=noticia-detalhe">
                                            <h2>Sanções da LGPD começam a valer e preocupam empresas que não estão prontas</h2>
                                        </a>
                                        <p>
                                            As punições previstas na Lei Geral de Proteção de Dados (LGPD) começam a valer a 
                                            partir de domingo (01/08). O órgão responsável por aplicar as sanções previstas 
                                            na legislação — que foi aprovada em 2018 e que passou a valer em setembro de 2020...
                                        </p>
                                        <a href="index.php?view=noticia-detalhe" class="button button-blog">Veja mais</a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a class="active" href="#">Esporte</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li>
                                            <a href="#">Marcar como lida
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1 Agosto, 2021
                                                <i class="lnr lnr-calendar-full"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">1.2M Visualizações
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">06 Comentários
                                                <i class="lnr lnr-bubble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="<?= SITEURL ?>assets/img/blog/m-blog-rebecaandrade.jpeg" alt="">
                                    <div class="blog_details">
                                        <a href="index.php?view=noticia-detalhe">
                                            <h2>Dia quase perfeito coloca Brasil acima do recorde histórico na previsão de medalhas</h2>
                                        </a>
                                        <p>
                                            Após nove dias de competições, o Brasil está com dois ouros, três pratas e cinco bronzes 
                                            nas Olimpíadas de Tóquio, totalizando dez medalhas. Além disso, o país já tem outras 
                                            duas medalhas garantidas com o boxe, mas ainda não se sabe se ouro, prata ou bronze. 
                                            Então já são 12 pódios certos...
                                        </p>
                                        <a class="button button-blog" href="index.php?view=noticia-detalhe">Veja mais</a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">01</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">02</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">03</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">04</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">09</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                <div class="col-lg-4">                    
                    <?php require_once "home-sidebar.php" ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->loadView("comuns/rodape") ?>