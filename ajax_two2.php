<?php
if($_POST)
{
    $data = $_POST['data'];
    $media = $_POST['media'];
    $name = $data->name ?? '';
    $bed = $data['pba__bedrooms_pb__c'] ?? 0;
    $bath = $data['pba__fullbathrooms_pb__c'] ?? 0;
    $area = $data['pba__totalarea_pb__c'] ?? 0;
    $type = $data['pba__propertytype__c'] ?? null;
    $description = $data['pba__description_pb__c'] ?? null;
    $neighor = $data['pba__neighborhood_pb__c'] ?? null;
    if($neighor == null):
        $neighor = '<h2>Not Found</h2>';
    else:
        $neighor = '<iframe
              width="600"
              height="450"
              style="border:0"
              loading="lazy"
              allowfullscreen
              src="https://www.google.com/maps/embed/v1/place?key=API_KEY
                &q=Space+Needle,Seattle+WA">
            </iframe>';
    endif;
        
    $facts = 's';
    $details_Desc= 'd';
    
    $desc_arr = explode(" ", $description);
    if(in_array("Property", $desc_arr) && in_array("Details:", $desc_arr))
    {
        foreach($desc_arr as $row => $key)
        {
            $facts = $key;
        }
    }
    else
    {
        foreach($desc_arr as $row)
        {
            $details_Desc = $row;
        }
    }
    $images = $media ?? null;
    
    $html = '<body style="padding-top: 0rem !Important;">
        <main role="main">
    
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    
    
          <!-- Marketing messaging and featurettes
          ================================================== -->
          <!-- Wrap the rest of the page in another container to center all the content. -->
    
          <div class="container marketing">
    
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-12">
                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Facts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Payment Plan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Neighbourhood</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Floor Plans</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Photos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Videos</a>
                  </li>
                </ul>
                </div>
            </div><!-- /.row -->
    
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="container">
                        <div class="col-md-9">
                            <div class="row featurette">
                              <div class="col-md-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">';
                                    foreach($images['images'] as $row => $image):  
                                        $cond = $row==0 ? 'active' : '';
                                        $html .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$row.'" class="'.$cond.'"></li>';
                                    endforeach;
                                  $html .= '</ol>
                                  <div class="carousel-inner">';
                                    foreach($images['images'] as $row => $image):  
                                        $cond = $row==0 ? 'active' : '';
                                        $html .= '<div class="carousel-item '.$cond.'">
                                            <img class="d-block w-100" src="'.$image['url'].'" alt="'.$image['title'].'">
                                        </div>';
                                    endforeach;
                                  $html .='</div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>

                              </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">Bed: '.$bed.'</div>
                                <div class="col-md-3">Bat: '.$bath.'</div>
                                <div class="col-md-3">Area: '.$area.'Sqft'.'</div>
                                <div class="col-md-3">Type: '.$type.'</div>
                            </div>
                            
                            <div class="row mt-4">
                                <h3>Property Info</h3>
                                <div class="col-md-12 mt-4">
                                <textarea class="myInnertextarea" onload="autosize();">'.
                                    ($description)
                                .'</textarea></div>
                            </div>
                            
                            <div class="row mt-4">
                                <h3>Payment Plans</h3>
                                <div class="col-md-12 mt-4">'.
                                    $dd
                                .'</div>
                            </div>
                        
                            <div class="row mt-4">
                                <h3>NeighbourHood</h3>
                                <div class="col-md-12 mt-4">'.
                                    $neighor
                                .'</div>
                            </div>
                            
                            <div class="row mt-4">
                                <h3>Floor Plan</h3>
                                <div class="col-md-12 mt-4">'.
                                    $dd
                                .'</div>
                            </div>
                      </div>
                    </div>
                      
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.ds..</div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.ss..</div>
            </div>
            <!-- START THE FEATURETTES -->
    
            <hr class="featurette-divider">
    
          </div><!-- /.container -->
        </main>
      </body>';
      
    echo json_encode($html);   
    
}
?>