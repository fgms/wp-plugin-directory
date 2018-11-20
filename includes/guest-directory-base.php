<?php
?>
<div id="wrapper">
    <div id="sidebar">
        <a type="button" class="navbar-toggle btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        </a>
        <nav id="nav" class="navigation" role="navigation" role="tablist">
            <ul class="unstyled" data-ga-category="Main Navigation">
                <li data-toggle="tooltip" data-original-title="Directory" class="">
                    <a data-scroll href="#section0">
                        <i class="fgms-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php 
                $count = 0;
                foreach ($options['sections'] as $section) :
                ?>
                <li data-toggle="tooltip" data-original-title="<?php echo $section['title'] ?>" >
                    <a data-scroll href="#section<?php echo $count ?>">
                        <i class="fgms-<?php echo $section['type'] ?>"></i> 
                        <span><?php echo $section['title'] ?></span>
                    </a>
                </li>
                <?php 
                $count += 1;
                endforeach ;
                ?>
            </ul>
        </nav><!-- /nav -->
  	</div><!-- /sidebar -->
  	<div class="directory-content">
  		<div id="image-side-scroll" class="ads directory-ad" data-ga-category="Sidebar Ads">
          {% for ads in options['ads'] %}
            {% set feature_image = false %}
            {% set img_id = ads.image %}
            {% if img_id is iterable %}{% set img_id = img_id | first %}{% endif %}
            {% if  img_id + 0 > 0 %}
              {% set feature_image = TimberImage(img_id) %}
            {% endif %}
            <div class="ad-item"><img src="{{feature_image}}" alt="" /></div>
          {% endfor %}
        </div>
  			<div id="container">
  				<!-- Home section -->
  				<div id="body-scroll">
  				<!-- Directory section -->
            <section class="module module-intro" id="section0"  data-ga-category="Directory">
              <div class="column-wrapper">
                <div class="row">
                  <div class="col-md-4 ">
                    {% set feature_image = false %}
                    {% set img_id = options['dir-logo'] %}
                    {% if img_id is iterable %}{% set img_id = img_id | first %}{% endif %}
                    {% if  img_id + 0 > 0 %}
                      {% set feature_image = TimberImage(img_id) %}
                      <div class="logo-directory"><a href="" ><img src="{{feature_image.src}}" alt="Directory Logo"/></a></div>
                    {% endif %}

                    <div class="directory-buttons">
                      {% for button in options['sections'] %}
                        <a href="#section{{loop.index}}" class="btn btn-primary btn-services">{{button.title}} <i class="circle-arrow-down"></i></a>
                      {% endfor %}
                      {% for button in options['dir-buttons'] %}
                        {% if button.name|length > 2 %}
                        <a href="{{button.url}}" class="btn btn-primary btn-services">{{button.name}} <i class="circle-arrow-down"></i></a>
                        {% endif %}
                      {% endfor %}
                    </div>
                  </div>
                  <div class="col-md-8">
                    {% for section in options['home-section'] %}
                      <h3>{{section.title}}</h3>
                      <div class="section-content">{{section.content}}</div>
                      {% include section.type~'.twig' ignore missing %}
                    {% endfor %}
                  </div>
                </div>
              </div>


    				</section>

            {% for section in options['sections'] %}
            <section  class="module module-{{section['module-type'] |  default('')}}"
                      id="section{{loop.index}}"
                      data-section="{{loop.index}}"
                      data-ga-category="{{section.title}}">

              <div class="column-wrapper">
                <h2>{{section.title}}</h2>
                <div class="section-content">{{section.content}}</div>
                {% include section.type~'.twig' ignore missing %}
              </div>
    				</section>
            {% endfor %}

  			</div>
    		</div><!-- /container -->
    	</div>
    </div><!-- /wrapper -->
