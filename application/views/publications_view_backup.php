
<div class="pos-rel">
   <div class="bg-banner">
      <div class="container">
         <div class="title-banner">Publications</div>
      </div>
   </div>
   <div class="img-banner" style="background:url('<?php echo base_url('images/banner/banner-publications.jpg');?>') no-repeat center 0;width:100%;"></div>
</div>

<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-sm-3 col-md-2 xs20">
            <ul class="t-menu">
               <li>
                  <a href="<?php echo site_url('news');?>">News</a>
                  <ul class="h-menu" style="display: none;">
                  <!-- get news year -->
                     <?php foreach($news_year as $year):
                        $date = date_create($year['news_start']);
                     ?>
                     <li><a href="<?php echo site_url('news');?>"> <?php echo date_format($date,'Y'); ?></a></li>
                     <?php endforeach; ?>
                  </ul>
               </li>
               <li><a href="<?php echo site_url('publications');?>" class="active">Publications</a></li>
               <li><a href="<?php echo site_url('video');?>">Video</a></li>
            </ul>
         </div>
         <div class="col-sm-9">
            <div class="box-search">
               <div class="top-search">
                  <div class="i-search">Search File</div>
               </div>
               <div class="bottom-search">
                  <form>
                     <div class="row">
                        <div class="col-sm-6 col-md-5">
                           <div class="form-group">
      								<label>Keyword</label>
   									<input class="form-control" type="text" name="keyword" placeholder="Enter File Title Or Keyword"/>
   								</div>
                        </div>
                        <div class="col-sm-3 col-md-4">
                           <div class="form-group">
      								<label>Year</label>
      								<div class="custom-select">
      									<div class="i-select"><img src="<?php echo base_url('images/icons/arrow-search.png');?>" class="img-responsive"/></div>
      									<select class="custom-select" name="year">
      										<option value="1" selected="">All</option>
      										<option value="2">2017</option>
      									</select>
      								</div>
      							</div>
                        </div>
                        <div class="col-sm-3">
                           <button class="btn btn-search btn-public" type="submit">
                              <div class="inline-block">
                                 <img src="<?php echo base_url('images/icons/search.png');?>" style="position: relative; top: -1px; right: 5px;">
                              </div>
                              <div class="inline-block">SEARCH</div>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="bdr-search"></div>
            <div class="t-job green">Fact Sheets and Presentations</div>
            <div class="box-public">
               <div class="row">
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document01.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Montara Operations Revised Environment Plan Public Consultation Fact Sheet</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="t-job green">Reports and Policies</div>
            <div class="box-public">
               <div class="row">
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document01.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Montara Operations Revised Environment Plan Public Consultation Fact Sheet</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Montara Operations Revised Environment Plan Public Consultation Fact Sheet</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document01.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipis elit. Nullam eu ligula sapien.</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Montara Operations Revised Environment Plan Public Consultation Fact Sheet</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="item-sshe tbl item-public">
                        <div class="cell w115">
                           <img src="<?php echo base_url('images/sshe/document02.jpg');?>" class="mb20 img-responsive"/>
                        </div>
                        <div class="cell">
                           <div>
                              <div class="inline-block">
                                 <div class="s-day">2</div>
                              </div>
                              <div class="inline-block">
                                 <div class="s-date">May <br/>2017</div>
                              </div>
                           </div>
                           <p>Montara Operations Revised Environment Plan Public Consultation Fact Sheet</p>
                           <a href="document/document.rtf" download><div class="i-download">Download This File</div></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(function() {
   $("ul.main-menu li a.nav-news").addClass("current");
});
</script>
