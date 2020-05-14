<?php get_header() ?>
    <main>
        <section id="home">
            <div class="overlay">
                <div class="main-title">
                    <h1><span class="color-primary">Adriano</span> Lorenzo González</span></h1>
                    <p class="slogan">Desarrollador web fullstack</p>
                </div>
                <a id="goToPage" href="#about" class="go-to-page"></a>
            </div>
        </section>
        <section id="about">
            <div class="container">
                <h2>Sobre mí</h2>
                <div class="line"></div>
                <div class="about">
                    <div class="about-img">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/figure.png" class="img-responsive">
                    </div>
                    <div class="about-text">
                        <p class="quote"><span class="quote-left"></span> Puedes llegar a cualquier lado, siempre que andes lo suficiente <span class="quote-right"></span></p>
                        <p class="intro">Hola, soy Adriano: filósofo, diseñador, desarrollador... <strong><br>explorador de nuevos mundos</strong>.</p>
                        <ul class="about-list">
                            <li>
                                <span class="icon-circle"></span>
                                <strong>Licenciado en Filosofía</strong>
                            </li>
                            <li>
                                <span class="icon-circle"></span>
                                <strong>Master Profesional de Diseño gráfico y web</strong>
                            </li>
                            <li>
                                <span class="icon-circle"></span>
                                <strong>Técnico Superior en Desarrollo de Aplicaciones Multiplataforma</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="technologies">
            <div class="overlay">
                <div class="container">
                    <h2>Tecnologías</h2>
                    <div class="line"></div>
                    <div class="technologies">
                    <?php
                        $args = array(  
                            'post_type' => 'technologies',
                            'post_status' => 'publish',
                            'posts_per_page' => 50,
                            'orderby' => 'date',
                            'order' => 'asc'
                        );
                    
                        $loop = new WP_Query( $args ); 
                            
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                            $image = get_field('imagen');
                                if( $image ): ?>
                                    <div class="technology">
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" title="<?= $image['title'] ?>">
                                    </div>
                            <?php endif;
                        endwhile;
                    
                        wp_reset_postdata(); 
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="interests">
            <div class="container">
                <h2>Intereses</h2>
                <div class="line"></div>
                <div class="row">
                    <?php
                        $args = array(  
                            'post_type' => 'interests',
                            'post_status' => 'publish',
                            'posts_per_page' => 50,
                            'orderby' => 'date',
                            'order' => 'asc'
                        );
                    
                        $loop = new WP_Query( $args ); 
                            
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                            $interestName = get_the_title();
                            $interestIcon = get_field('icono');
                            if( $interestIcon ): ?>
                                <div class="interest">
                                    <div>
                                        <i class="<?= $interestIcon ?>"></i>
                                    </div>
                                    <p><?= $interestName ?></p>
                                </div>
                        <?php endif;
                        endwhile;
                    
                        wp_reset_postdata(); 
                    ?>
                </div>
            </div>
        </section>
        <section id="works">
            <div class="container">
                <h2>Trabajos</h2>
                <div class="line"></div>
                <div class="filters">
                    <span>Filtrar por tipo:</span>
                    <div>
                        <a id="all" class="active" href="#">Todos</a>
                        <a id="jobs" href="#">Trabajos</a>
                        <a id="personal" href="#">Personales</a>
                    </div>
                </div>
                <ul class="works">
                    <?php
                        $args = array(  
                            'post_type' => 'works',
                            'post_status' => 'publish',
                            'posts_per_page' => 50,
                            'orderby' => 'date',
                            'order' => 'desc'
                        );
                    
                        $loop = new WP_Query( $args ); 
                            
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                            $workId = get_the_ID();
                            $workName = get_the_title();
                            $workType = get_field('tipo');
                            $workClass = get_field('clase');
                            $workIcon = get_field('icono');
                            if( $workIcon ): ?>
                                <li class="work <?= $workClass ?>" data-id="<?= $workId ?>">
                                    <div class="hover-text">
                                        <h3><?= $workName ?></h3>
                                        <p><?= $workType ?></p>
                                    </div>
                                    <img src="<?= $workIcon['url'] ?>" alt="<?= $workIcon['alt'] ?>" title="<?= $workIcon['title'] ?>">
                                </li>
                        <?php endif;
                        endwhile;
                        wp_reset_postdata(); 
                    ?>
                </ul>
            </div>
        </section>
        <section id="quotes">
            <div class="overlay">
                <div class="container">
                    <div id="quotes-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                               <blockquote>
                                  <p class="quote"><span class="quote-left"></span>La vida cobra sentido cuando se hace de ella una aspiración a no renunciar a nada<span class="quote-right"></span></p>
                                  <p class="author">José Ortega y Gasset</p>
                              </blockquote>   
                            </div>
                            <div class="carousel-item">
                              <p class="quote"><span class="quote-left"></span>Quien pretenda una felicidad y sabiduría constantes, deberá acomodarse a frecuentes cambios<span class="quote-right"></span></p>
                              <div class="author">Confucio</div>
                            </div>
                            <div class="carousel-item">
                              <p class="quote"><span class="quote-left"></span>Si buscas resultados diferentes, no hagas siempre lo mismo<span class="quote-right"></span></p>
                              <div class="author">Albert Einstein</div>
                            </div>
                            <div class="carousel-item">
                              <p class="quote"><span class="quote-left"></span>El saber no es suficiente, debemos aplicarlo. El querer no es suficiente, debemos hacer<span class="quote-right"></span></p>
                              <div class="author">Bruce Lee</div>
                            </div>
                            <div class="carousel-item">
                              <p class="quote"><span class="quote-left"></span>Cuando el carro se ha roto, muchos os dirán por dónde no se debía pasar<span class="quote-right"></span></p>
                              <div class="author">Proverbio turco</div>
                            </div>
                          </div>
                          <ol class="carousel-indicators">
                              <li data-target="#quotes-slider" data-slide-to="0" class="active"></li>
                              <li data-target="#quotes-slider" data-slide-to="1"></li>
                              <li data-target="#quotes-slider" data-slide-to="2"></li>
                              <li data-target="#quotes-slider" data-slide-to="3"></li>
                              <li data-target="#quotes-slider" data-slide-to="4"></li>
                          </ol>
                        </div>
                </div>
            </div>
        </section>
    </main>
    <section id="contact">
        <div class="container">
            <h2>Contacto</h2>
            <div class="line"></div>
            <div class="container">
                <div class="form-container">
                    <form class="contact-form" action="#contact" method="POST" >
                        <p>Escríbeme y demuestra que no eres un robot con el test de Touring inverso</p>
                        <?= do_shortcode('[contact-form-7 id="10" title="Contact form 1"]'); ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php get_footer() ?>