<?php if(!class_exists('Rain\Tpl')){exit;}?>      <div class="ms-hero-page ms-hero-img-coffee ms-hero-bg-success mb-6">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Categorias</h1>
            <p class="lead lead-lg color-white text-center center-block mt-2 mb-4 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Discover our projects and the
              <span class="color-warning">rigorous process</span> of creation. Our principles are creativity, design, experience and knowledge.</p>
            <a href="javascript:void(0)" class="btn btn-raised btn-warning animated fadeInUp animation-delay-10">
              <i class="zmdi zmdi-accounts"></i> Our Services</a>
            <a href="javascript:void(0)" class="btn btn-raised btn-info animated fadeInUp animation-delay-10">
              <i class="zmdi zmdi-email"></i> Concact us</a>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-none d-lg-block">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-filter-list"></i>Filtro de lista</h3>
              </div>
              <div class="card-body no-pb">
                <form class="form-horizontal">
                  <h4 class="no-m color-primary">Categorias</h4>
                  <div class="form-group mt-1">
                    <div class="radio no-mb">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios0" value="option0" checked="" class="filter" data-filter="all"> Todas </label>
                    </div>
                    <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

                    <div class="radio no-mb">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="option<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="filter" data-filter=".category-<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </label>
                    </div>
                    <?php } ?>

                  </div>
                </form>
                <h4 class="mt-2 color-primary no-mb">Colunas</h4>
              </div>
              <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-4" role="tablist">
                <li class="nav-item">
                  <a id="Cols1" class="nav-link withoutripple" href="#home7" aria-controls="home7" role="tab" data-toggle="tab">1</a>
                </li>
                <li class="nav-item">
                  <a id="Cols2" class="nav-link withoutripple" href="#profile7" aria-controls="profile7" role="tab" data-toggle="tab">2</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a id="Cols3" class="nav-link active withoutripple" href="#messages7" aria-controls="messages7" role="tab" data-toggle="tab">3</a>
                </li>
                <li class="nav-item">
                  <a id="Cols4" class="nav-link withoutripple" href="#settings7" aria-controls="settings7" role="tab" data-toggle="tab">4</a>
                </li>
              </ul>
              <div class="card-body pr-0">
                <form class="form-horizontal">
                  <div class="form-group no-mt">
                    <h4 class="no-m color-primary mb-2">Descrições</h4>
                    <div class="togglebutton">
                      <label>
                        <input id="port-show" type="checkbox"> Mostrar descrição </label>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row" id="Container">
              
              <!-- item -->
              <?php $counter1=-1;  if( isset($subcategories) && ( is_array($subcategories) || $subcategories instanceof Traversable ) && sizeof($subcategories) ) foreach( $subcategories as $key1 => $value1 ){ $counter1++; ?>

              <div class="col-lg-4 col-md-6 mix category-<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <div class="card">
                  <a href="/cat<?php echo htmlspecialchars( $value1["idsubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <figure class="ms-thumbnail">
                    <img src="res/site/img/demo/port2.jpg" alt="" class="img-fluid">
                    <figcaption class="ms-thumbnail-caption text-center">
                      <div class="ms-thumbnail-caption-content">
                        <h4 class="ms-thumbnail-caption-title mb-2"><?php echo htmlspecialchars( $value1["dessubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                      </div>
                    </figcaption>
                  </figure>
                  <div class="card-body overflow-hidden text-center portfolio-item-caption d-none">
                    <h3 class="color-primary no-mt"><?php echo htmlspecialchars( $value1["dessubcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    <p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>
                  </div>
                </a>
                </div>
              </div>
              <?php } ?>

              <!-- item -->

            </div>
          </div>
        </div>
      </div>
